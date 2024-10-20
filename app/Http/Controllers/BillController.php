<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Patient;
use App\Models\Hospital;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with(['patient', 'hospital'])->get();
        return response()->json($bills);
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'patient_id' => 'required|exists:patients,id',
            'hospital_id' => 'required|exists:hospitals,id',
        ]);

        $bill = Bill::create($request->all());
        return response()->json($bill, 201);
    }

    public function show($id)
    {
        $bill = Bill::with(['patient', 'hospital'])->findOrFail($id);
        return response()->json($bill);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'sometimes|required|numeric',
            'date' => 'sometimes|required|date',
            'patient_id' => 'sometimes|required|exists:patients,id',
            'hospital_id' => 'sometimes|required|exists:hospitals,id',
        ]);

        $bill = Bill::findOrFail($id);
        $bill->update($request->all());
        return response()->json($bill);
    }

    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->delete();
        return response()->json(null, 204);
    }
}
