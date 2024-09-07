<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function authenticate() {
        
        if(Auth::id()) {
            $role = Auth()->user()->role();
            if($role == 'tenant') {
                return view ('userView.homepage');
            }
            else if($role == 'admin') {
                return view ('admin.homepage');
            }
            else {
                return redirect()-back();
            }
        }
    }


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
}
