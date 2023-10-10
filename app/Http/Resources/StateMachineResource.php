<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StateMachineResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'is_determinate' => $this['is_determinate'],
            'can_be_disassembled' => $this['can_be_disassembled'],
            'table' => $this['table'],
        ];
    }
}
