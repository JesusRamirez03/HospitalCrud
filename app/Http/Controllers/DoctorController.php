<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\Hospital;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with(['specialty','hospital'])->get();
        return response()->json($doctors);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|mac:255',
            'specialty_id' => 'required|exists:specialties,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:doctors',        
        ]);

        $doctor = Doctor::create($request->all());
        return response()->json($doctor,201);
    }

    public function show($id)
    {
        $doctor = Doctor::with(['specialty','hospital'])->findOrFail($id);
        return response()->json($doctor);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'specialty_id' => 'sometimes|required|exists:specialties,id',
            'hospital_id' => 'sometimes|required|exists:hospitals,id',
            'phone' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|max:255|unique:doctors,email,' . $id,
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());
        return response()->json($doctor);
    }


    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return response()->json(null, 204);
    }
}
