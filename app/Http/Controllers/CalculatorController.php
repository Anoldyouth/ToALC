<?php

namespace App\Http\Controllers;

use App\Actions\CalculatorAction;
use App\Http\Requests\CalculatorRequest;
use App\Http\Resources\CalculatorResource;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(CalculatorRequest $request, CalculatorAction $action): CalculatorResource
    {
        return new CalculatorResource([
            'result' => $action->execute($request->getExpression()),
        ]);
    }
}
