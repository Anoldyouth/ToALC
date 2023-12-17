<?php

namespace App\Actions;

use App\Data\ErrorData;
use Ds\Stack;
use Exception;
use Illuminate\Support\Arr;

class SyntaxAnalyzerAction
{
    private const EPS = '~';
    private const END = '$';
    private const EOL = '@';
    private array $terminals = [];
    private array $nonTerminals = [];
    /** @var string[][][] $transitions */
    private array $transitions = [];
    private ?string $startNonTerminal = null;
    private array $first = [];
    private array $follow = [];
    private array $table = [];

    public function execute(string $grammarPath, string $filepath, bool $isDebug)
    {
        $this->prepareGrammar($grammarPath);

        $this->prepareTable();

        file_put_contents("parse_table.md", $this->createMarkdownTable());

        $text = rtrim(file_get_contents($filepath)) . self::END;

        $rowsCount = substr_count($text, PHP_EOL);
        $lastLineBreak = strrpos($text, PHP_EOL);
        if ($lastLineBreak) {
            $lastLineLength = strlen(substr($text, $lastLineBreak + 1));
        } else {
            $lastLineLength = strlen($text);
        }

        $text = str_replace(PHP_EOL, self::EOL, $text);

        $text = str_split($text);

        $stack = new Stack();
        $stack->push('$', $this->startNonTerminal);
        $currentRow = 1;
        $currentSym = 1;

        $errors = [];

        while (true) {
//            if ($isDebug) {
//                dump($stack, implode($text));
//            }
            $top = $stack->pop();

            if ($top == self::EPS) {
                continue;
            }

            $sym = Arr::first($text);

            if ($top == self::END && $sym == self::END) {
                break;
            }

            if ($top == self::END && $sym != self::END) {
                $errors[] = new ErrorData($currentRow, $currentSym, $rowsCount, $lastLineLength);

                break;
            }

            if ($top == $sym) {
                array_shift($text);
                if ($sym == self::EOL) {
                    $currentRow++;
                    $currentSym = 1;
                } else {
                    $currentSym++;
                }

                continue;
            }

            try {
                $stack->push(...array_reverse($this->table[$top][$sym]));
            } catch (\Exception $exception) {
                if ($isDebug) {
                    dump("Error!", $top, $stack, implode($text));
                }

                if ($top == '<possible_space>') {
                    array_unshift($text, $sym);

                    continue;
                }

                if ($top == '<statement_block>' || $top == '<declaration>') {
                    array_unshift($text, $sym);
                    $stack->push(...array_reverse($this->table[$top]['l']));

                    continue;
                }

                $rowFrom = $currentRow;
                $symFrom = $currentSym;

                while (in_array($top, $this->terminals) && $top != $sym) {
                    $top = $stack->pop();
                }

                if ($top == $sym) {
                    if ($isDebug) {
                        dump("---skipped---", $stack, implode($text), "-----end skipped----");
                    }
                    $sym = array_shift($text);
                    $errors[] = new ErrorData($currentRow, $currentSym, $currentRow, $currentSym);

                    continue;
                }

                if ($isDebug) {
                    dump("------", $top, $stack, implode($text), "---------");
                }

                $sync = $this->getSync($top);

                try {
                    do {
                        $sym = array_shift($text);
                        $prevRow = $currentRow;
                        $prevSym = $currentSym;
                        if ($sym == self::EOL) {
                            $currentRow++;
                            $currentSym = 1;
                        } else {
                            $currentSym++;
                        }

                        if (is_null($sym)) {
                            throw new Exception("Неожиданное завершение файла!");
                        }
                    } while (!in_array($sym, $sync));
                } catch (Exception $exception) {
                    $errors[] = new ErrorData($rowFrom, $symFrom, $currentRow, $currentSym);

                    break;
                }

                array_unshift($text, $sym);

                $currentRow = $prevRow;
                $currentSym = $prevSym;

                $errors[] = new ErrorData($rowFrom, $symFrom, $currentRow, $currentSym);

                if ($isDebug) {
                    dump("restored", $stack, implode($text), "end restored");
                }
            }
        }

        return $errors;
    }

    /**
     * Подготавливает грамматику для дальнейшего использования <p>
     * Разбивает на терминалы и не терминалы, подготавливает для работы со стеком
     *
     * @param string $grammarPath путь до грамматики
     * @return void
     */
    private function prepareGrammar(string $grammarPath): void
    {
        $handle = fopen($grammarPath, 'r');
        $startNonTerminal = null;
        $transitions = [];

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                preg_match("/^(<[a-z_]+?>) -> (.+)$/", $line, $parts);

                preg_match_all('/(<[a-z_]+?>)/', $parts[2], $nonTerminals);
                $nonTerminals = array_merge([$parts[1]], $nonTerminals[0]);
                if (!$startNonTerminal) {
                    $startNonTerminal = $parts[1];
                }

                $replaced = str_replace(array_merge($nonTerminals, [" | "]), "", $parts[2]);
                $terminals = array_unique(str_split($replaced));

                foreach (explode(' | ', $parts[2]) as $exploded) {
                    $transitions[$parts[1]][] = $this->split($exploded, $nonTerminals);
                }

                $this->terminals = array_merge($this->terminals, $terminals);
                $this->nonTerminals = array_merge($this->nonTerminals, [$parts[1]]);
            }

            $this->terminals = array_unique($this->terminals);
            $this->nonTerminals = array_unique($this->nonTerminals);
            $this->transitions = $transitions;
            $this->startNonTerminal = $startNonTerminal;
        }
    }

    /**
     * Разбивка строки на терминалы и не терминалы для стека
     *
     * @param string $stringForSplit строка для разбивки
     * @param string[] $nonTerminals список не терминалов строки для игнорирования
     * @return array разбивка для стека
     */
    private function split(string $stringForSplit, array $nonTerminals): array
    {
        $strings = [$stringForSplit];

        foreach ($nonTerminals as $nonTerminal) {
            $newStrings = [];

            foreach ($strings as $string) {
                $exploded = explode($nonTerminal, $string);
                $new = [];

                foreach ($exploded as $explode) {
                    $new[] = $explode;
                    $new[] = $nonTerminal;
                }

                array_pop($new);

                $newStrings = array_merge($newStrings, $new);
            }

            $strings = $newStrings;
        }

        $strings = array_filter($strings, fn($string) => !($string === "" || $string === " | "));

        $split = [];
        foreach ($strings as $string) {
            if (in_array($string, $nonTerminals)) {
                $split[] = $string;

                continue;
            }

            $split = array_merge($split, str_split($string));
        }

        return $split;
    }

    private function prepareTable()
    {
        foreach (array_reverse($this->nonTerminals) as $nonTerminal) {
            $this->first[$nonTerminal] = array_unique($this->first($nonTerminal));
        }

        foreach ($this->nonTerminals as $nonTerminal) {
            if (!isset($this->follow[$nonTerminal])) {
                $this->follow($nonTerminal);
            }
        }

//        dump($this->follow);
//        dump($this->first);

        foreach ($this->nonTerminals as $nonTerminal) {
            $transitions = $this->transitions[$nonTerminal];
            $follow = $this->follow[$nonTerminal];

            foreach ($transitions as $transition) {
                $first = $this->first(Arr::first($transition));

                foreach ($first as $term) {
                    if ($term != self::EPS) {
                        $this->table[$nonTerminal][strval($term)] = $transition;
                    } else {
                        foreach ($follow as $followTerm) {
                            $this->table[$nonTerminal][strval($followTerm)] = [self::EPS];
                        }
                    }
                }
            }
        }

//        dump($this->table);
    }

    private function first(?string $current): array
    {
        if ($current === null) {
            return [];
        }

        if (in_array($current, $this->terminals)) {
            return [$current];
        }

        $transitions = $this->transitions[$current];
        $first = [];

        foreach ($transitions as $transition) {
            $first = array_merge($first, $this->first(Arr::first($transition)));
        }

        return $first;
    }

    private function follow(string $current): void
    {
        if ($current == $this->startNonTerminal) {
            $this->follow[$current] = [self::END];
        }

        foreach ($this->transitions as $nonTerminal => $transitions) {
            foreach ($transitions as $transition) {
                if (!in_array($current, $transition)) {
                    continue;
                }

                for ($i = 0; $i < count($transition);) {
                    if ($transition[$i] != $current) {
                        $i++;

                        continue;
                    }

                    do {
                        $i++;

                        $first = $this->first(Arr::get($transition, $i));
                        $firstWithoutEps = array_diff($first, [self::EPS]);

                        if (!empty($firstWithoutEps)) {
                            $this->follow[$current] = array_merge($this->follow[$current] ?? [], $firstWithoutEps);
                        }
                    } while ($first != $firstWithoutEps);

                    if (empty($first)) {
                        if (!isset($this->follow[$nonTerminal])) {
                            $this->follow($nonTerminal);
                        }

                        $this->follow[$current] = array_merge($this->follow[$current] ?? [], $this->follow[$nonTerminal]);
                    }
                }
            }
        }

        $this->follow[$current] = array_unique($this->follow[$current]);
    }

    private function getSync(string $nonTerminal): array
    {
        try {
            return array_unique(array_merge($this->first[$nonTerminal], $this->follow[$nonTerminal]));
        } catch (\Throwable $exception) {
            return [];
        }
    }

    function createMarkdownTable(): string
    {
        $markdownTable = '';

        // Добавляем заголовок таблицы
        $markdownTable .= '| ' . "Нетерминалы" . ' | ' . implode(' | ', $this->terminals) . " |\n";

        // Добавляем разделительную строку
        $markdownTable .= '| ' . ' --- |' . str_repeat(' --- |', count($this->terminals)) . "\n";

        // Добавляем строки с данными
        foreach ($this->nonTerminals as $nonTerminal) {
            $markdownTable .= '| ' . $nonTerminal;
            $sync = $this->getSync($nonTerminal);

            foreach ($this->terminals as $terminal) {
                if (isset($this->table[$nonTerminal][$terminal])) {
                    $markdownTable .= ' | ' . implode($this->table[$nonTerminal][$terminal]);
                } elseif (in_array($terminal, $sync)) {
                    $markdownTable .= ' | ' . 'Sync';
                } else {
                    $markdownTable .= ' | ' . ' ';
                }
            }

            $markdownTable .= " |\n";
        }

        return $markdownTable;
    }
}
