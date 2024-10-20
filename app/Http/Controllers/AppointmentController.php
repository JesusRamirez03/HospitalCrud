<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor', 'hospital'])->get();
        return response()->json($appointments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|string|max:10',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'hospital_id' => 'required|exists:hospitals,id',
        ]);

        $appointment = Appointment::create($request->all());
        return response()->json($appointment, 201);
    }

    public function show($id)
    {
        $appointment = Appointment::with(['patient', 'doctor', 'hospital'])->findOrFail($id);
        return response()->json($appointment);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'sometimes|required|date',
            'time' => 'sometimes|required|string|max:10',
            'patient_id' => 'sometimes|required|exists:patients,id',
            'doctor_id' => 'sometimes|required|exists:doctors,id',
            'hospital_id' => 'sometimes|required|exists:hospitals,id',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());
        return response()->json($appointment);
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json(null, 204);
    }
}
