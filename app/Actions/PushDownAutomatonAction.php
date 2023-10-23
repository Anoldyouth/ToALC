<?php

namespace App\Actions;

use App\Data\ConfigurationData;
use App\Data\TransitionFunctionResponseData;
use Ds\Map;
use Ds\Stack;

class PushDownAutomatonAction
{
    private const EPS = null;
    private const H0 = null;
    private const LAMBDA = null;
    private string $fileName;
    private array $terminals = [];
    private array $nonTerminals = [];
    private Map $commands;
    private Stack $stack;
    private Stack $configurationsStack;

    public function __construct()
    {
        $this->fileName = $_SERVER['DOCUMENT_ROOT'] . '/../resources/files/lab3_3.txt';
        $this->commands = new Map();
        $this->stack = new Stack();
        $this->configurationsStack = new Stack();
    }

    public function execute(string $expression): array
    {
        $this->fillAutomaton();

        $isAcceptable = $this->searchValidChain($expression);

        /** @var ConfigurationData $key */
        $commands = [];
        foreach ($this->commands->keys() as $key) {
            $states = '';
            /** @var TransitionFunctionResponseData $value */
            foreach ($this->commands->get($key) as $value) {
                $states .= '; ' . $value->hash();
            }
            $commands[$key->hash()] = '{' . substr($states, 2) . '}';
        }

        return ['result' => [
            'is_acceptable' => $isAcceptable,
            'multiplicity' => [
                'P' => '{' . implode(' ', $this->terminals) . '}',
                'Z' => '{' . implode(' ', array_merge($this->terminals, $this->nonTerminals, ['h0'])) . '}',
                'S' => '{s0}',
                'F' => '{s0}',
            ],
            'commands' => $commands,
            'configurations' => $this->configurationsStack->toArray() ?? null,
        ]];
    }

    private function fillAutomaton(): void
    {
        $handle = fopen($this->fileName, 'r');
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                preg_match('/^([A-Z])>(.+)$/', str_replace(' ', '', $line), $parts);
                preg_match_all('/([^A-Z|])/', $parts[2], $terminals);
                preg_match_all('/([A-Z])/', $parts[2], $nonTerminals);
                $this->terminals = array_merge($this->terminals, $terminals[0]);
                $this->nonTerminals = array_merge($this->nonTerminals, $nonTerminals[0], [$parts[1]]);
                $transitions[$parts[1]] = explode('|', $parts[2]);
            }
            $this->terminals = array_unique($this->terminals);
            $this->nonTerminals = array_unique($this->nonTerminals);
            /**
             * @var string $from
             * @var array $to
             * */
            foreach ($transitions ?? [] as $from => $states) {
                $responses = [];
                foreach ($states as $state) {
                    $responses[] = new TransitionFunctionResponseData(
                        "s0",
                        str_split(strrev($state)),
                    );
                }
                $this->commands->put(new ConfigurationData(
                    "s0",
                    $this->commands->isEmpty() ? self::EPS : self::LAMBDA,
                    $from,
                ), $this->specialSort($responses, $from));
            }
            foreach ($this->terminals as $terminal) {
                $this->commands->put(new ConfigurationData(
                    "s0",
                    $terminal,
                    $terminal,
                ), [new TransitionFunctionResponseData(
                    "s0",
                    self::LAMBDA,
                )]);
            }
            $this->commands->put(new ConfigurationData(
                "s0",
                self::LAMBDA,
                self::H0,
            ), [new TransitionFunctionResponseData(
                "s0",
                self::LAMBDA,
            )]);
            $this->stack->push('E');
            fclose($handle);
        }
    }

    private function searchValidChain(string $expression): bool
    {
        return $this->searchConfiguration('s0', $expression, $this->stack);
    }

    private function searchConfiguration(string $state, string $expression, Stack $stack): bool
    {
        if ($stack->count() > 10) {
            return false;
        }
        $char = substr($expression, 0, 1);
        if ($stack->isEmpty() && empty($char)) {
            $this->configurationsStack->push("({$state}, lambda, h0)");
            return true;
        }

        if ($stack->isEmpty() && !empty($char)) {
            return false;
        }

        $symb = $stack->pop();

        $config = new ConfigurationData($state, $char, $symb);

        if ($commands = $this->commands->get($config, [])) {

            /** @var TransitionFunctionResponseData $command */
            $otherStringPart = substr($expression, 1);
            foreach ($commands as $command) {
                $newStack = clone $stack;
                $newStack->push(...($command->chain ?? []));
                if ($this->searchConfiguration($command->state, $otherStringPart, $newStack)) {
                    $stringForConfig = empty($expression) ? 'lambda' : $expression;
                    $stringStack = implode('', array_reverse(array_merge([$symb], $stack->toArray(), ['h0'])));
                    $this->configurationsStack->push("({$state}, {$stringForConfig}, {$stringStack})");
                    return true;
                }
            }
        }

        $config->symbol = null;

        if ($commands = $this->commands->get($config, [])) {
            /** @var TransitionFunctionResponseData $command */
            foreach ($commands as $command) {
                $newStack = clone $stack;
                $newStack->push(...($command->chain ?? []));
                if ($this->searchConfiguration($command->state, $expression, $newStack)) {
                    $stringForConfig = empty($expression) ? 'lambda' : $expression;
                    $stringStack = implode('', array_reverse(array_merge([$symb], $stack->toArray(), ['h0'])));
                    $this->configurationsStack->push("({$state}, {$stringForConfig}, {$stringStack})");
                    return true;
                }
            }
        }

        return false;
    }

    private function specialSort(array $responses, string $nonTerminal): array
    {
        $withTerminals = [];
        $withSameNonTerminalAtEnd = [];
        $withNonTerminals = [];
        /** @var TransitionFunctionResponseData $response */
        foreach ($responses as $response) {
            $chain = $response->chain;
            if (end($chain) == $nonTerminal) {
                $withSameNonTerminalAtEnd[] = $response;
                continue;
            }

            if (in_array(end($chain), $this->terminals)) {
                $withTerminals[] = $response;
                continue;
            }

            $withNonTerminals[] = $response;
        }

        return array_merge($withTerminals, $withNonTerminals, $withSameNonTerminalAtEnd);
    }
}
