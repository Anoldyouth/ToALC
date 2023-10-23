<?php

namespace App\Data;

use Ds\Hashable;

class TransitionFunctionResponseData implements Hashable
{
    public function __construct(
        public readonly string $state,
        public readonly ?array $chain,
    ) {
    }

    public function equals($obj): bool
    {
        return $this->state == $obj->state
            && array_diff($this->chain, $obj->chain) === array_diff($obj->chain, $this->chain);
    }

    public function hash(): string
    {
        $chain = $this->chain ? implode("", $this->chain) : 'lambda';

        return "({$this->state}, {$chain})";
    }
}
