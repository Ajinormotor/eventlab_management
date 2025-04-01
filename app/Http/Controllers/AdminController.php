<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(){
        $events =  Event::with('user')->latest()->paginate(5);
        return Inertia::render('Admin/Dashboard',[
            'events' => $events
        ]);
    }


    public function indexProfile(Request $request){

        $user = $request->user();
       
       
        return Inertia::render('Admin/Profile',[
            'user' => $user,
            'status' => session('status')
        ]);    
    }



    public function showProfile(Request $request){
        
        $user = $request->user();
        return Inertia::render('Admin/ShowProfile',[
            'user' => $user,
            'status' => session('status')
        ]);
    }
}
