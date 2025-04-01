<?php

namespace App\Http\Controllers;

use App\Models\EventUser;
use App\Http\Requests\StoreEventUserRequest;
use App\Http\Requests\UpdateEventUserRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $field = $request->validate([
            'name' => 'required|min:3|max:225',
            'phone_no' => 'required|max:225|min:3',
        ]);
        

        $event = Event::findOrFail($request->event_id);
       $event->eventusers()->create($field);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(EventUser $eventUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventUser $eventUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventUserRequest $request, EventUser $eventUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventUser $eventUser)
    {
        //
    }
}
