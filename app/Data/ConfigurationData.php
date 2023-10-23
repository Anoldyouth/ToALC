<?php

namespace App\Data;

use Ds\Hashable;

class ConfigurationData implements Hashable
{
    public function __construct(
        public readonly string $state,
        public ?string $symbol,
        public readonly ?string $pdaSymbol,
    ) {
    }

    public function equals($obj): bool
    {
        return $this->state == $obj->state
            && $this->symbol == $obj->symbol
            && $this->pdaSymbol == $obj->pdaSymbol;
    }

    public function hash(): string
    {
        $symbol = $this->symbol ?? 'lambda';
        $pdaSymbol = $this->pdaSymbol ?? 'h0';

        return "({$this->state}, {$symbol}, {$pdaSymbol})";
    }
}
