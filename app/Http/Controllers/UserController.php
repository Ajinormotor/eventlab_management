<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
   public function index(Request $request){
      $events =  Event::with('user')->latest()->paginate(5);
      $event_user = EventUser::with('events')->latest()->paginate(10);

    return Inertia::render('User/Dashboard',[
      'events' => $events,
      'eventUser' => $event_user
    ]);
   }
}
