<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{ 
    //First UI makita sa user nig open sa website
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

        return view('userView.homepage', compact('bh'));
 }
 
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|url',
            'monthly' => 'required|numeric',
        ]);

        $bh = BoardingHouse::create($data);

        return redirect()->route('bh.show', $bh->id);
    }

    //Visit para mo tan-aw sa boarding house
    // public function show($id)
    // {
    //     $room = Room::findOrFail($id);
    //     return view('boardingHouse.show', compact('room'));
    // }

    public function show($id)
    {
        $bh = BoardingHouse::findOrFail($id);
        return view('boardingHouse.show', compact('bh'));
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
    
        return view('boardingHouse.landing', compact('bh', 'address'));
    }

}
