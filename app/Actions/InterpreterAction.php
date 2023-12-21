<?php

namespace App\Actions;

use Exception;
use function Laravel\Prompts\text;
use function Laravel\Prompts\info;

class InterpreterAction
{
    private array $memory = [];

    public function __construct(
        protected SyntaxAnalyzerAction $syntaxAnalyzerAction,
        protected CalculatorAction $calculatorAction,
    ) {
    }

    public function execute(string $grammarPath, string $filepath): array
    {
        $errors = $this->syntaxAnalyzerAction->execute($grammarPath, $filepath, false);

        if ($errors) {
            return [
                'errors' => $errors,
            ];
        }

        try {
            $this->readProgram(file_get_contents($filepath));
        } catch (Exception $e) {
            return [
                'errors' => [[
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'class' => $e::class,
                ]],
            ];
        }

        return [
            'errors' => null,
        ];
    }

    /**
     * @throws Exception
     */
    private function readProgram(string $program): void
    {
        $split = str_split($program);

        for ($i = 0; $i < count($split); $i++) {
            $char = $split[$i];

            if (in_array($char, [" ", PHP_EOL])) {
                continue;
            }

            $i += match ($char) {
                "p" => $this->parsePrint(substr($program, $i)),
                "s" => $this->parseScan(substr($program, $i)),
                "f" => $this->parseFor(substr($program, $i)),
                "i" => $this->parseIf(substr($program, $i)),
                default => $this->parseAssign(substr($program, $i)),
            };
        }
    }

    /**
     * @throws Exception
     */
    private function parsePrint(string $subprogramText): int
    {
        if (!str_starts_with($subprogramText, "print")) {
            throw new Exception("Ошибка чтения");
        }

        $subprogram = str_split($subprogramText);

        for ($i = 6; $i < count($subprogram); $i++) {
            if (in_array($subprogram[$i], [" ", PHP_EOL, ','])) {
                continue;
            }

            if ($subprogram[$i] == ';') {
                break;
            }

            if ($subprogram[$i] == '"') {
                $out = "";
                $i++;

                do {
                    $out .= $subprogram[$i];
                    $i++;
                } while ($subprogram[$i] != '"');

                info(">> $out");
            } else {
                $expression = "";

                while (!in_array($subprogram[$i], [',', ';'])) {
                    if ($subprogram[$i] == "#") {
                        $var = "";

                        while (preg_match('/^[a-zA-Z_#]$/', $subprogram[$i])) {
                            $var .= $subprogram[$i];
                            $i++;
                        }

                        $expression .= $this->memory[$var] ?? 0;
                    } else {
                        $expression .= $subprogram[$i];
                        $i++;
                    }
                }

                info(">> " . $this->calculatorAction->execute(trim($expression)));
                $i--;
            }
        }

        return $i;
    }

    /**
     * @throws Exception
     */
    private function parseScan(string $subprogramText): int
    {
        if (!str_starts_with($subprogramText, "scan")) {
            throw new Exception("Ошибка чтения");
        }

        $subprogram = str_split($subprogramText);

        for ($i = 5; $i < count($subprogram); $i++) {
            if (in_array($subprogram[$i], [" ", PHP_EOL])) {
                continue;
            }

            if ($subprogram[$i] == ';') {
                break;
            }

            if ($subprogram[$i] == "#") {
                $var = "";

                while (preg_match('/^[a-zA-Z_#]$/', $subprogram[$i])) {
                    $var .= $subprogram[$i];
                    $i++;
                }

                $i--;

                $scan = text('<< ', required: true);

                $this->memory[$var] = $scan;
            }
        }

        return $i;
    }

    private function parseAssign(string $subprogramText): int
    {
        $subprogram = str_split($subprogramText);
        $var = null;

        for ($i = 0; $i < count($subprogram); $i++) {
            if (in_array($subprogram[$i], [" ", PHP_EOL, "="])) {
                continue;
            }

            if ($subprogram[$i] == ';') {
                break;
            }

            if ($subprogram[$i] == "#" && !$var) {
                $var = "";

                while (preg_match('/^[a-zA-Z_#]$/', $subprogram[$i])) {
                    $var .= $subprogram[$i];
                    $i++;
                }

                $i--;
            } else {
                $expression = "";

                while (isset($subprogram[$i]) && $subprogram[$i] != ';') {
                    if ($subprogram[$i] == "#") {
                        $exprVar = "";

                        while (preg_match('/^[a-zA-Z_#]$/', $subprogram[$i])) {
                            $exprVar .= $subprogram[$i];
                            $i++;
                        }

                        $expression .= $this->memory[$exprVar] ?? 0;
                    } else {
                        $expression .= $subprogram[$i];
                        $i++;
                    }
                }

                $i--;

                $this->memory[$var] = $this->calculatorAction->execute($expression);
            }
        }

        return $i;
    }

    private function parseFor(string $subprogramText)
    {
        if (!str_starts_with($subprogramText, "for")) {
            throw new Exception("Ошибка чтения");
        }

        $i = 3;
        $subprogram = str_split($subprogramText);

        while (in_array($subprogram[$i], [" ", PHP_EOL])) {
            $i++;
        }

        if ($subprogram[$i] != '(') {
            throw new Exception("Отсутствует скобка для for");
        }

        $brackets = 1;
        $i++;
        $start = $i;

        while ($brackets > 0) {
            if (!in_array($subprogram[$i], ['(', ')'])) {
                $i++;

                continue;
            }

            if ($subprogram[$i] == '(') {
                $brackets++;
                $i++;

                continue;
            }

            $brackets--;
            $i++;
        }

        $assigmentText = substr($subprogramText, $start, $i - $start - 1);

        $from = "";
        $assigment = str_split($assigmentText);
        for ($j = 0; $j < count($assigment); $j++) {
            if (in_array($assigment[$j], [" ", PHP_EOL])) {
                continue;
            }

            while (preg_match('/^[a-zA-Z_#]$/', $assigment[$j])) {
                $from .= $assigment[$j];
                $j++;
            }

            break;
        }

        $this->parseAssign($assigmentText);

        while (in_array($subprogram[$i], [" ", PHP_EOL])) {
            $i++;
        }

        if ($subprogram[$i] != 't' || $subprogram[$i + 1] != 'o') {
            throw new Exception("Ошибка чтения to");
        }
        $i += 2;

        while (in_array($subprogram[$i], [" ", PHP_EOL])) {
            $i++;
        }

        $expression = "";

        while ($subprogram[$i] != '{') {
            $expression .= $subprogram[$i];
            $i++;
        }

        while (in_array($subprogram[$i], [" ", PHP_EOL])) {
            $i++;
        }

        $brackets = 1;
        $i++;
        $start = $i;

        while ($brackets > 0) {
            if (!in_array($subprogram[$i], ['{', '}'])) {
                $i++;

                continue;
            }

            if ($subprogram[$i] == '{') {
                $brackets++;
                $i++;

                continue;
            }

            $brackets--;
            $i++;
        }

        $body = substr($subprogramText, $start, $i - $start - 1);

        if (!isset($this->memory[$from])) {
            $this->memory[$from] = 0;
        }

        for (; $this->memory[$from] < $this->calculatorAction->execute($this->insertVariables($expression)); $this->memory[$from]++) {
            $this->readProgram($body);
        }

        return $i;
    }

    private function insertVariables(string $expressionText): string
    {
        $expression = str_split($expressionText);

        $inserted = "";
        for ($i = 0; $i < count($expression); $i++) {
            if ($expression[$i] == "#") {
                $exprVar = "";

                while (isset($expression[$i]) && preg_match('/^[a-zA-Z_#]$/', $expression[$i])) {
                    $exprVar .= $expression[$i];
                    $i++;
                }

                $inserted .= $this->memory[$exprVar] ?? 0;
            } else {
                $inserted .= $expression[$i];
                $i++;
            }
        }

        return $inserted;
    }

    private function parseIf(string $subprogramText)
    {
        if (!str_starts_with($subprogramText, "if")) {
            throw new Exception("Ошибка чтения if");
        }

        $subprogram = str_split($subprogramText);
        $i = 2;

        while (in_array($subprogram[$i], [" ", PHP_EOL])) {
            $i++;
        }

        $firstExpression = "";

        while (!in_array($subprogram[$i], ['<', '>', '=', '!'])) {
            $firstExpression .= $subprogram[$i];
            $i++;
        }

        $operator = "";

        switch ($subprogram[$i]) {
            case '<': {
                $operator = '<';

                break;
            }
            case '>': {
                $operator = '>';

                break;
            }
            case '=': {
                $operator = '==';
                $i++;

                break;
            }
            case '!': {
                $operator = '!=';
                $i++;

                break;
            }
        }

        $i++;

        $secondExpression = "";

        while ($subprogram[$i] != '{') {
            $secondExpression .= $subprogram[$i];
            $i++;
        }

        $brackets = 1;
        $i++;
        $start = $i;

        while ($brackets > 0) {
            if (!in_array($subprogram[$i], ['{', '}'])) {
                $i++;

                continue;
            }

            if ($subprogram[$i] == '{') {
                $brackets++;
                $i++;

                continue;
            }

            $brackets--;
            $i++;
        }

        $bodyIf = substr($subprogramText, $start, $i - $start - 1);

        while (isset($subprogram[$i]) && in_array($subprogram[$i], [" ", PHP_EOL])) {
            $i++;
        }

        $first = $this->calculatorAction->execute($this->insertVariables(trim($firstExpression)));
        $second = $this->calculatorAction->execute($this->insertVariables(trim($secondExpression)));
        $if = match ($operator) {
            '<' => $first < $second,
            '>' => $first > $second,
            '==' => $first == $second,
            '!=' => $first != $second,
        };

        if (($subprogram[$i] ?? '') != 'e'
            || ($subprogram[$i + 1] ?? '') != 'l'
            || ($subprogram[$i + 2] ?? '') != 's'
            || ($subprogram[$i + 3] ?? '') != 'e'
        ) {
            if ($if) {
                $this->readProgram($bodyIf);
            }

            return --$i;
        }

        while ($subprogram[$i] != '{') {
            $i++;
        }

        $brackets = 1;
        $i++;
        $start = $i;

        while ($brackets > 0) {
            if (!in_array($subprogram[$i], ['{', '}'])) {
                $i++;

                continue;
            }

            if ($subprogram[$i] == '{') {
                $brackets++;
                $i++;

                continue;
            }

            $brackets--;
            $i++;
        }

        $bodyElse = substr($subprogramText, $start, $i - $start - 1);

        if ($if) {
            $this->readProgram($bodyIf);
        } else {
            $this->readProgram($bodyElse);
        }

        return --$i;
    }
}
