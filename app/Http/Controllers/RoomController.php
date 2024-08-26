<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // public function index()
    // {
    //     Room::orderBy('id','DESC')->paginate(10);
     
    // }
     public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('room.show', compact('room'));
    }
//     public function show($id)
// {
//     $room = Room::find($id);

//     if (!$room) {
//         return response()->json(['error' => 'Room not found'], 404);
//     }

//     dd($room);
// }

}
