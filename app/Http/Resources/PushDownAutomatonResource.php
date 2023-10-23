<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PushDownAutomatonResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'result' => $this['result'],
        ];
    }
}
