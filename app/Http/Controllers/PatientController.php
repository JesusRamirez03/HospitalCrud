<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Hospital;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    
    public function index()
    {
        $patients = Patient::with('hospital')->get();
        return response()->json($patients);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'hospital_id' => 'required|exists:hospitals,id',
            'social_security_number' => 'required|string|max:11|unique:patients',
        ]);

        $patient = Patient::create($request->all());
        return response()->json($patient, 201);
    }

    public function show($id)
    {
        $patient = Patient::with('hospital')->findOrFail($id);
        return response()->json($patient);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'date_of_birth' => 'sometimes|required|date',
            'hospital_id' => 'sometimes|required|exists:hospitals,id',
            'social_security_number' => 'sometimes|required|string|max:11|unique:patients,social_security_number,' . $id,
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return response()->json($patient);
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return response()->json(null, 204);
    }
}
