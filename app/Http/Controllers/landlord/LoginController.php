<?php

namespace App\Http\Controllers\landlord;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view ('landlord.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validator->passes()) {

            if(Auth::guard('landlord')->attempt(['email' => $request->email, 'password' => $request->password])) {

                if(Auth::guard('landlord')->user()->role != 'landlord') {
                   Auth::guard('landlord')->logout();
                    return redirect()->route('landlord.login')->with('error', 'You are not authorized to access this page.');

                }
                
                return redirect()->route('landlord.dashboard')->with('success','welcome');
            }else {
                return redirect()->route('landlord.login')->with('error', 'Credentials are incorrect');
            }

        }else {
            return redirect()->route('landlord.login')
            ->withInput()
            ->withErrors($validator);
        }

    } 

    public function logout() {
        Auth::logout();
        return redirect()->route('landlord.login');

    }
}
