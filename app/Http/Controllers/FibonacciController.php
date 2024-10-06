<?php

namespace App\Http\Controllers;

use App\Services\FibonacciService;
use Illuminate\Http\Request;
use Log;

class FibonacciController extends Controller
{
    protected $fibonacciService;

    public function __construct(FibonacciService $fibonacciService)
    {
        $this->fibonacciService = $fibonacciService;
    }

    public function getFib(Request $request)
    {
        try {
            $validated = $request->validate([
                'n' => 'required|integer|min:1'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request.'
            ], 400);
        }
        $result = $this->fibonacciService->calculateFibonacci($validated['n']);
        return response()->json(['result' => $result], 200);
    }
}
