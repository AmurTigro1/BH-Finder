<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
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
    public function showModal($id)
    {
        $room = Room::findOrFail($id);
        return view('room.room_modal', compact('room'));
    }

    public function reserve(Request $request, $id) {

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'visit_date' => 'required|date|after_or_equal:today',

        ]);
        
        $data = new Reservation;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $visit_date = $request->visit_date;
        $isReserved = Reservation::where('room_id', $id)
        ->Where('visit_date', $visit_date)
        ->exists();

        if($isReserved) {
            return redirect()->back()->with('message', 'Room is already reserved, try different date');
        }
        else{
            $data->visit_date = $request->visit_date;

            $data->save();
    
            return redirect()->back()->with('message', 'Room has been reserved.');
        }
    
        }
       

}
