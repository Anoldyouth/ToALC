<?php

namespace App\Http\Controllers;

use App\Actions\SyntaxAnalyzerAction;
use App\Http\Requests\SyntaxAnalyzerRequest;
use App\Http\Resources\SyntaxAnalyzerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SyntaxAnalyzerController extends Controller
{
    public function syntaxAnalyzer(SyntaxAnalyzerRequest $request, SyntaxAnalyzerAction $action): AnonymousResourceCollection
    {
        return SyntaxAnalyzerResource::collection($action->execute($request->getGrammarPath(), $request->getFilePath(), $request->isDebug()));
    }
}
