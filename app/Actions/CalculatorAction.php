<?php

namespace App\Actions;

use Exception;
use Throwable;

class CalculatorAction
{
    /**
     * Массив элементов выражения
     * @var int[] $tokens
     */
    private array $tokens = [];

    /** индекс текущего токена */
    private int $pos = 0;

    public const FUNCTION_NAME = "log";

    public const FUNCTION_PARAMS_COUNT = 2;

    /**
     * @throws Exception
     */
    public function execute(string $expression): ?string
    {
        $this->splitExpressionToTokens(str_replace(" ", '', $expression));

        $result = $this->addition();

        if ($this->pos != count($this->tokens)) {
            throw new Exception("Ошибка выражения: " . $this->tokens[$this->pos]);
        }

        return $result;
    }

    /**
     * @throws Exception
     */
    private function splitExpressionToTokens(string $expression): void
    {
        $found = "";
        $chars = str_split($expression);
        for ($i = 0; $i < count($chars); $i++) {
            if (substr($expression, $i, strlen($this::FUNCTION_NAME)) == $this::FUNCTION_NAME) {
                $this->tokens[] = $this::FUNCTION_NAME;
                $i += strlen($this::FUNCTION_NAME) - 1;
                continue;
            }

            if ($chars[$i] == '-' && !isset($chars[$i + 1])) {
                throw new Exception("Ошибка в чтении строки");
            }

            if ($chars[$i] == '-' && $chars[$i + 1] == '-' && !isset($chars[$i + 2])) {
                throw new Exception("Ошибка в чтении строки");
            }

            if (($chars[$i] === '-') && (($chars[$i + 1] ?? null) === '-')) {
                if ($chars[$i + 2] != '-') {
                    $found = $this->addTokens($found, '+');
                }
                $i++;
                continue;
            }


            if ($chars[$i] == '-' && ($chars[$i + 1] ?? null) == '(') {
                $this->addTokens('-1', '*');
                continue;
            }

            $found = match ($chars[$i]) {
                "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "." => $found . $chars[$i],
                "+", "/", "*", "(", ")", "," => $this->addTokens($found, $chars[$i]),
                "-" => $this->addNegative($found),
                default => throw new Exception("Ошибка в чтении строки"),
            };
        }

        $this->addTokens($found);
    }

    private function addNegative(?string $found): string
    {
        $previous = end($this->tokens);

        if ($previous == ")") {
            $this->tokens[] = "+";
        }

        if (!$found) {
            return "-";
        }

        $this->addTokens($found, "+");
        return "-";
    }

    private function addTokens(?string $number, ?string $symbol = null): string
    {
        if ($number != "") {
            if (!preg_match('/^-?[0-9]*\.?[0-9]*$/', $number)) {
                throw new Exception("Ошибка в чтении числа");
            }
            $this->tokens[] = floatval($number);
        }

        if (isset($symbol)) {
            $this->tokens[] = $symbol;
        }

        return "";
    }

    /**
     * @throws Exception
     */
    private function addition(): float
    {
        // находим первое слагаемое
        $first = $this->mulDiv();

        while ($this->pos < count($this->tokens)) {
            $operator = $this->tokens[$this->pos] ?? null;

            if (!isset($operator)) {
                throw new Exception("Оператор не найден");
            }

            if ($operator != "+") {
                break;
            } else {
                $this->pos++;
            }

            // находим второе слагаемое.
            $second = $this->mulDiv();
            $first += $second;
        }
        return $first;
    }

    /**
     * @throws Exception
     */
    private function mulDiv(): float
    {
        // находим первый множитель (делимое)
        $first = $this->atom();

        while ($this->pos < count($this->tokens)) {
            $operator = $this->tokens[$this->pos] ?? null;

            if (!isset($operator)) {
                throw new Exception("Оператор не найден");
            }

            if ($operator != "*" && $operator != "/") {
                break;
            } else {
                $this->pos++;
            }

            // находим второй множитель (делитель)
            $second = $this->atom();
            if ($operator == "*") {
                $first *= $second;
            } else {
                try {
                    $first /= $second;
                } catch (Throwable) {
                    throw new Exception("Деление на ноль");
                }
            }
        }
        return $first;
    }

    /**
     * @throws Exception
     */
    private function atom(): float
    {
        $token = $this->tokens[$this->pos] ?? null;

        if (!isset($token)) {
            throw new Exception("Токен не найден");
        }

        if ($token == $this::FUNCTION_NAME) {
            $this->pos++;
            return $this->log();
        }

        return $this->brackets();
    }

    /**
     * @throws Exception
     */
    private function brackets(): float
    {
        $next = $this->tokens[$this->pos] ?? null;

        if (!isset($next)) {
            throw new Exception("Токен не найден");
        }

        if ($next != "(") {
            $this->pos++;
            // в противном случае токен должен быть числом
            return floatval($next);
        }

        $this->pos++;
        // если выражение в скобках, то рекурсивно переходим на обработку подвыражения
        $result = $this->addition();
        if ($this->pos < count($this->tokens)) {
            $closingBracket = $this->tokens[$this->pos] ?? null;
        } else {
            throw new Exception("Неожиданный конец выражения");
        }

        if ($closingBracket == ")") {
            $this->pos++;
            return $result;
        }
        throw new Exception("Ожидалось ')', но получено " . $closingBracket);
    }

    /**
     * @throws Exception
     */
    private function log(): float
    {
        if ($this->tokens[$this->pos] != "(") {
            throw new Exception("Ожидалось '(', но получено " . $this->tokens[$this->pos]);
        }

        $args = [];

        $this->pos++;
        $args[] = $this->addition();

        while (count($args) < $this::FUNCTION_PARAMS_COUNT) {
            if ($this->tokens[$this->pos] != ",") {
                throw new Exception("Ожидалось ',', но получено " . $this->tokens[$this->pos]);
            }

            $this->pos++;
            $args[] = $this->addition();
        }

        if ($this->tokens[$this->pos] != ")") {
            throw new Exception("Ожидалось ')', но получено " . $this->tokens[$this->pos]);
        }
        $this->pos++;

        try {
            return log(...$args);
        } catch (Throwable) {
            throw new Exception("Основание логарифма должно быть больше нуля");
        }
    }
}
