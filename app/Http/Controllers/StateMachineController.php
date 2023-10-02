<?php

namespace App\Http\Controllers;

use App\Actions\StateMachineAction;
use App\Http\Requests\StateMachineRequest;
use App\Http\Resources\StateMachineResource;
use Illuminate\Http\Request;

class StateMachineController extends Controller
{
    public function stateMachine(StateMachineRequest $request, StateMachineAction $action): StateMachineResource
    {
        return new StateMachineResource($action->execute($request->getExpression()));
    }
}
