<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class AdminEventController extends Controller
{
    public function index(Request $request){

       

        $events = User::with('events')
        ->filter(request(['search']))
        -> latest()
        ->paginate()
        ->withQueryString();
       
        return Inertia::render('AdminEvent/Dashboard',[
            'events' => $events,
            'search' => $request->search
        ]);
    }


    // show users with all events
    public function showUser(user $user, Request $request){
    
         $events = $user->events()
         ->filter(request(['search']))
         ->latest()
         ->paginate(10)
         ->withQueryString();
               
        return Inertia::render('AdminEvent/ShowUser',[
            'events' => $events,
            'search' => $request->search
        ]);
    }

    //update user role
    public function updateRole(Request $request, User $user) { 

     
        $request->validate([
            'role' => 'required|string|max:225|in:user,admin,suspended' 
        ]);
    
        $user->update(['role' => $request->role]);
    
        return back()
        ->with('status', "User role has been updated to {$request->role} successfully");
    }
    


    
    //update user role
    public function approvedEvent(Event $event)
    {
   
        Log::info('Before Update', ['id' => $event->id, 'progress' => $event->progress]);
        $event->fresh();
       
        $newStatus = $event->progress === 'approved' ? 'canceled' : 'approved';
   
        $event->update(['progress' => $newStatus]);
    
        // Log::info('After Update', ['id' => $event->id, 'progress' => $event->refresh()->progress]);

        $msg = $newStatus === 'approved' ? 'Approved' : 'Canceled';
    
        return back()->with('status', "Post {$msg} successfully!");
    }
    

        }



