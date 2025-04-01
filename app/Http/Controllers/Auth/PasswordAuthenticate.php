<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordResetLinkSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Inertia\Inertia;
use PHPUnit\Event\Test\Passed;
use  Illuminate\Support\Str;

class PasswordAuthenticate extends Controller
{
    public function forgotIndex(){
        return Inertia::render('Auth/ForgotPassword',[
            'status' => session('status')
        ]);
    }

public function forgotStore(Request $request) {

$request->validate([
    'email' => 'required|email'
]);

$status = Password::sendResetLink(
    $request->only('email', $request->email)
);

 $status === Password::RESET_LINK_SENT
 ? back()->with(['status' => __($status)])
 : back()->withErrors(['email' => __($status)]);

}


public function resetIndex(Request $request){
    return Inertia::render('Auth/ResetPassword',[
        'email' => $request->email,
        'token' => $request->route('token'),
        'status'  =>  session('status')
    ]);

}


    
public function resetStore(Request $request){
    $request->validate([
        'email' => 'required|email',
        'token'  => 'required',
        'password' => 'required|confirmed|min:3|max:225'


    ]);


    $status = Password::reset(
$request->only(['email', 'password', 'password_confirmation', 'token']),
function(User $user,String  $password) use ($request){
    $user->forceFill([
        'password' => Hash::make($password)
   ])->setRememberToken(Str::random(64));


     $user->save();
    event(new Password($user));



}

    );



    $status === Password::PASSWORD_RESET
    ? redirect()->route('login')->with(['status' => __($status)])
    : back()->withErrors(['email' => __($status)]);
}


}
