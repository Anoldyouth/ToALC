<?php

namespace App\Http\Resources;

use App\Data\ErrorData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ErrorData
 */
class SyntaxAnalyzerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'from' => $this->rowFrom . ":" . $this->symFrom,
            'to' => $this->rowTo . ":" . $this->symTo,
        ];
    }
}
