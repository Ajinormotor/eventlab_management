<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthenticateController extends Controller
{
    public function loginIndex(){
        return Inertia::render('Auth/Login',[
            'status' => session('status')
        ]);
     }
 
 
    

     public function loginStore(Request $request) {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required|min:3'
         ]);
     
         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
             $request->session()->regenerate(); 
             return redirect()->route('dashboard.user'); 
         }
     
         return back()->withErrors([
             'status' => 'The provided credentials do not match our records.',
         ]);
     }
     

     public function logout(Request $request){

      $user = $request->user();
      Auth::logout($user);
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
