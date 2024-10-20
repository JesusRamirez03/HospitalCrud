<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{

    public function index()
    {
        $specialties = Specialty::all();
        return response()->json($specialties);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:specialties',
        ]);

        $specialty = Specialty::create($request->all());
        return response()->json($specialty, 201);
    }

    public function show($id)
    {
        $specialty = Specialty::findOrFail($id);
        return response()->json($specialty);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255|unique:specialties,name,' . $id,
        ]);

        $specialty = Specialty::findOrFail($id);
        $specialty->update($request->all());
        return response()->json($specialty);
    }

    public function destroy($id)
    {
        $specialty = Specialty::findOrFail($id);
        $specialty->delete();
        return response()->json(null, 204);
    }
}
