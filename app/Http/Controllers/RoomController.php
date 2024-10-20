<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with(['hospital', 'patient'])->get();
        return response()->json($rooms);
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|integer',
            'hospital_id' => 'required|exists:hospitals,id',
            'patient_id' => 'nullable|exists:patients,id',
        ]);

        $room = Room::create($request->all());
        return response()->json($room, 201);
    }

    public function show($id)
    {
        $room = Room::with(['hospital', 'patient'])->findOrFail($id);
        return response()->json($room);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'sometimes|required|integer',
            'hospital_id' => 'sometimes|required|exists:hospitals,id',
            'patient_id' => 'nullable|exists:patients,id',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());
        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(null, 204);
    }
}
