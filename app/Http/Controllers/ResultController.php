<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\DiagnosticTest;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('diagnosticTest')->get();
        return response()->json($results);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'diagnostic_test_id' => 'required|exists:diagnostic_tests,id',
        ]);

        $result = Result::create($request->all());
        return response()->json($result, 201);
    }

    public function show($id)
    {
        $result = Result::with('diagnosticTest')->findOrFail($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'sometimes|required|string',
            'diagnostic_test_id' => 'sometimes|required|exists:diagnostic_tests,id',
        ]);

        $result = Result::findOrFail($id);
        $result->update($request->all());
        return response()->json($result);
    }

    public function destroy($id)
    {
        $result = Result::findOrFail($id);
        $result->delete();
        return response()->json(null, 204);
    }
}
