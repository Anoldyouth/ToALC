<?php

namespace App\Actions;

use Ds\Map;
use Ds\Pair;
use Exception;
use Throwable;

class StateMachineAction
{
    private string $fileName;
    private array $alphabet = [];
    private string $initialState = 'q0';

    // Недетерминированные данные
    private array $states = [];
    private array $finalStates = [];
    private array $transitions = [];

    // Детерминированные данные
    private array $dStates = [];
    private array $dFinalStates = [];
    private array $dTransitions = [];

    public function __construct()
    {
        $this->fileName = $_SERVER['DOCUMENT_ROOT'] . '/../resources/files/lab2.txt';
    }

    public function execute(string $expression): array
    {
        $this->fillStateMachine();

        $isDeterminate = $this->isDeterminate();

        if (!$isDeterminate) {
            $this->determinateStateMachine();

            $this->simplification();
        }



        return [
            'is_determinate' => $isDeterminate,
            'table' => !$isDeterminate ? $this->toFileStyle($this->dTransitions) : [],
            'can_be_disassembled' => $this->canBeDisassembled(
                $isDeterminate ? $this->transitions : $this->dTransitions,
                $expression,
            ),
        ];
    }

    private function fillStateMachine(): void
    {
        $handle = fopen($this->fileName, 'r');
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                preg_match('/(q[0-9]+),(.)=([qf][0-9]+)/', $line, $matches);
                $this->transitions[$matches[1]][$matches[2]][] = $matches[3];
                $alphabet[] = $matches[2];
                $states[] = $matches[1];
                $states[] = $matches[3];
                if (str_starts_with($matches[3], 'f')) {
                    $finalStates[] = $matches[3];
                }
            }
            $this->alphabet = array_unique($alphabet ?? []);
            $this->finalStates = array_unique($finalStates ?? []);
            $this->states = array_unique($states ?? []);
            fclose($handle);
        }
    }

    private function determinateStateMachine(): void
    {
        $this->dStates = array_filter($this->getCombinations($this->states));
        foreach ($this->dStates as $dState) {
            foreach ($this->alphabet as $char) {
                $transition = [];
                foreach ($dState as $part) {
                    $transition = array_merge($transition, $this->transitions[$part][$char] ?? []);
                }
                if (!empty($transition)) {
                    $this->dTransitions[implode(" ", $dState)][$char] = array_unique($transition);
                }
            }
            if (array_intersect($this->finalStates, $dState)) {
                $dFinalStates[] = $dState;
            }
        }
        $this->dFinalStates = $dFinalStates ?? [];
    }

    private function simplification(): void
    {
        $verticesUsed = $this->breadthFirstSearch($this->dTransitions);
        $this->dTransitions = array_intersect_key($this->dTransitions, $verticesUsed);
        foreach ($this->dTransitions as &$transition) {
            foreach ($transition as &$value) {
                $value = array_unique($value);
            }
        }
    }

    private function getCombinations(array $array): array
    {
        $results = [[]];

        foreach ($array as $element) {
            foreach ($results as $combination) {
                $results[] = array_merge($combination, [$element]);
            }
        }

        return $results;
    }

    private function breadthFirstSearch($graph): array
    {
        $visited = [];
        $queue = [];

        array_push($queue, ...array_values($graph[$this->initialState]));
        $visited[$this->initialState] = true;

        while (count($queue) > 0) {
            $currentState = implode(" ", array_pop($queue));

            if (isset($visited[$currentState])) {
                continue;
            }

            array_push($queue, ...array_values($graph[$currentState] ?? []));
            $visited[$currentState] = true;
        }

        return $visited;
    }

    private function isDeterminate(): bool
    {
        try {
            foreach ($this->transitions as $arcs) {
                foreach ($arcs as $arc) {
                    if (count($arc) > 1) {
                        throw new Exception("Не детерминированный");
                    }
                }
            }

            return true;
        } catch (Exception) {
            return false;
        }
    }

    private function canBeDisassembled(array $transitions, string $expression): bool
    {
        try {
            $state = $this->initialState;
            foreach (str_split($expression) as $char) {
                $state = implode(" ", $transitions[$state][$char]);
            }

            return str_contains($state, 'f');
        } catch (Throwable) {
            return false;
        }
    }

    private function toFileStyle(array $transitions): array
    {
        $result = [];
        foreach ($transitions as $from => $transition) {
            foreach ($transition as $char => $to) {
                $stringTo = implode(" ", $to);
                $result[] = "{{$from}},$char={{$stringTo}}";
            }
        }

        return $result;
    }
}
