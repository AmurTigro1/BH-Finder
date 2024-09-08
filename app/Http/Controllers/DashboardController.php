<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    // public function authenticate() {
        
    //     if(Auth::id()) {
    //         $role = Auth()->user()->role();
    //         if($role == 'tenant') {
    //             return view ('userView.homepage');
    //         }
    //         else if($role == 'admin') {
    //             return view ('admin.homepage');
    //         }
    //         else {
    //             return redirect()-back();
    //         }
    //     }
    // }


    public function index(Request $request)
    {
        $bh = BoardingHouse::orderBy('created_at', 'DESC')->get();
        $search = request()->query('search');
        $address = request()->query('address');

        $bh = BoardingHouse::query();

        if ($search) {
            $bh->where(function ($query) use ($search) {
                $query->where('address', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('monthly', 'LIKE', "%{$search}%");
            });
    }

        if ($address) {
            $bh->where('address', $address);
        }

        $bh = $bh->simplePaginate(3);

        return view('userView.landing', compact('bh'));
 }

 public function show($id)
 {
     $bh = BoardingHouse::findOrFail($id);
     return view('userView.show', compact('bh'));
 }

 public function all(Request $request)
 {
     $search = $request->query('search');
     $address = $request->query('address');
 
     $bh = BoardingHouse::query();
 
     if ($search) {
         $bh->where(function ($query) use ($search) {
             $query->where('address', 'LIKE', "%{$search}%")
                 ->orWhere('name', 'LIKE', "%{$search}%")
                 ->orWhere('monthly', 'LIKE', "%{$search}%");
         });
     }
 
     if ($address) {
         $bh->where('address', 'LIKE', "%{$address}%");
     }
 
     $bh = $bh->paginate(4);
 
     return view('userView.all', compact('bh', 'address'));
 }

   public function showRoom($id)
    {
        $room = Room::findOrFail($id);
        return view('userView.view-room', compact('room'));
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
    public function search(Request $request)
    {
        $bh = BoardingHouse::orderBy('created_at', 'DESC')->get();
        $search = request()->query('search');
        $address = request()->query('address');

        $bh = BoardingHouse::query();

        if ($search) {
            $bh->where(function ($query) use ($search) {
                $query->where('address', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('monthly', 'LIKE', "%{$search}%");
            });
    }

        if ($address) {
            $bh->where('address', $address);
        }

        $bh = $bh->simplePaginate(3);

        return view('userView.search', compact('bh'));
 }

 public function signUp($id) {
  
    $room = Room::findOrFail($id);
        return view('userView.reserve-form', compact('room'));
}


}
