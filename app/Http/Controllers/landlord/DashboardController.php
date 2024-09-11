<?php

namespace App\Http\Controllers\landlord;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view ('landlord.dashboard');
    }

    public function add_room() {
       $boarding_house_id = BoardingHouse::all(); 

        return view ('landlord.add_room', compact('boarding_house_id'));
    }

    public function create_room(Request $request) {
        $data = new Room();
        $data->type = $request->room_type;
        $data->image = $request->image;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->description = $request->description;
        $data->occupancy = $request->occupancy;
        // $data->boarding_house_id = $request->boarding_house_id;
        $image = $request->image;

        if($image) {
            $imagename = time() . '. ' .$image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }
}
