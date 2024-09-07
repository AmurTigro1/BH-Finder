<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // public function index() {
        
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

    public function index() {
        return view ('admin.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validator->passes()) {

            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                
                return redirect()->route('account.dashboard')->with('success','welcome');
            }else {
                return redirect()->route('account.login')->with('error', 'Credentials are incorrect');
            }

        }else {
            return redirect()->route('account.login')
            ->withInput()
            ->withErrors($validator);
        }

    }
}
