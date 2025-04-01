<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function registerIndex(){
       return Inertia::render('Auth/Register');
    }


    public function registerStore(Request $request){
        $field = $request->validate([
          'first_name' => 'required|min:3',
         'last_name' => 'required|min:3|max:225',
        'email' => 'required|email',
        'gender' => 'required',
       'address' => 'required',
       'about' => 'nullable',
     'phone_no' => 'required',
     'image' => 'required|mimes:png,jpeg',
      'password' => 'required|min:3|max:225|confirmed',
                    
        ]);

if($request->hasFile('image')){
  $field['image'] =  Storage::disk('public')->put('image', $request->image);
}


     $user = User::create($field);

     Auth::login($user);

     event(new Registered($user));
     

     return redirect()->route('dashboard.user');

    }



}
