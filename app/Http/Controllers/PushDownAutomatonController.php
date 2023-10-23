<?php

namespace App\Http\Controllers;

use App\Actions\PushDownAutomatonAction;
use App\Http\Requests\PushDownAutomatonRequest;
use App\Http\Resources\PushDownAutomatonResource;

class PushDownAutomatonController extends Controller
{
    public function pda(PushDownAutomatonRequest $request, PushDownAutomatonAction $action): PushDownAutomatonResource
    {
        return new PushDownAutomatonResource($action->execute($request->getExpression()));
    }
}
