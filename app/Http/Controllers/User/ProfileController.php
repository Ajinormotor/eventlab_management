<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ProfileController extends Controller

{



    public function index(){


        $user = Auth::user();
        return Inertia::render('User/Profile',[
            'user' => $user
        ]);
    }



    public function showProfile(Request $request){
      
  $user = $request->user();
        return Inertia::render('User/ShowProfile',[
            'user' => $user,
            'status' => session('status')
        ]);
    }


    
    public function updateProfile(Request $request)
    {


        $field = $request->validate([
            'first_name' => 'nullable|min:3',
            'last_name' => 'nullable|min:3|max:225',
            'email' => [
                'nullable',
                'email',
                Rule::unique(User::class)->ignore($request->user()->id),
            ],
            'gender' => 'nullable',
            'address' => 'nullable',
            'about' => 'nullable',
            'phone_no' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpeg,jpg|max:10240',
        ]);

        $user = $request->user();
    
        if ($request->hasFile('image')) {
            if ($request->image) {
                Storage::disk('public')->delete($user->image);
            }
            $field['image'] = $request->file('image')->store('image', 'public');
       
        } else {
            unset($field['image']);
          
        }
   
    
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    

        $user->fill($field);
        $user->save();
    
        return back()->with([
            'status' => 'Updated successfully'
        ]);
    }

    public function destroyProfile(Request $request){

  $user = $request->user();

        if($user->image){
            $user->image = Storage::disk('public')->delete( $user->image);
        }

        $user->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }

}
