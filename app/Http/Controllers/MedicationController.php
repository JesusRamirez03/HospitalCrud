<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class MedicationController extends Controller
{

    public function index()
    {
        $medications = Medication::with(['patient', 'doctor'])->get();
        return response()->json($medications);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dose' => 'required|numeric',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $medication = Medication::create($request->all());
        return response()->json($medication, 201);
    }

    public function show($id)
    {
        $medication = Medication::with(['patient', 'doctor'])->findOrFail($id);
        return response()->json($medication);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'dose' => 'sometimes|required|numeric',
            'patient_id' => 'sometimes|required|exists:patients,id',
            'doctor_id' => 'sometimes|required|exists:doctors,id',
        ]);

        $medication = Medication::findOrFail($id);
        $medication->update($request->all());
        return response()->json($medication);
    }

    public function destroy($id)
    {
        $medication = Medication::findOrFail($id);
        $medication->delete();
        return response()->json(null, 204);
    }
}
