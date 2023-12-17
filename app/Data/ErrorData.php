<?php

namespace App\Data;

class ErrorData
{
    public function __construct(
        public int $rowFrom,
        public int $symFrom,
        public int $rowTo,
        public int $symTo,
    ) {
    }
}
