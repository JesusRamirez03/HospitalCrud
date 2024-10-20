<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticTest;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DiagnosticTestController extends Controller
{
    public function index()
    {
        $tests = DiagnosticTest::with(['patient', 'doctor'])->get();
        return response()->json($tests);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $test = DiagnosticTest::create($request->all());
        return response()->json($test, 201);
    }

    public function show($id)
    {
        $test = DiagnosticTest::with(['patient', 'doctor'])->findOrFail($id);
        return response()->json($test);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'sometimes|required|string|max:255',
            'date' => 'sometimes|required|date',
            'patient_id' => 'sometimes|required|exists:patients,id',
            'doctor_id' => 'sometimes|required|exists:doctors,id',
        ]);

        $test = DiagnosticTest::findOrFail($id);
        $test->update($request->all());
        return response()->json($test);
    }

    public function destroy($id)
    {
        $test = DiagnosticTest::findOrFail($id);
        $test->delete();
        return response()->json(null, 204);
    }
}
