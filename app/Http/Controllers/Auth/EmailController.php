<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailController extends Controller
{
    public function emailIndex(){
        return Inertia::render('Auth/EmailVerify', [
            'status'  => session("status")
        ]);

    }




public function emailStore(Request $request){
$request->validate([
    'email' => 'required|email'
]);


$request->user()->sendEmailVerificationNotification();
return back()->with(['status' => 'Verification Link Has Been Sent']);



}



public function emailShow(EmailVerificationRequest $request){

    $request->fulfill();
    return redirect()->route('dashboard.user');
}


}
