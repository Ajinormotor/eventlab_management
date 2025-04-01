<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
$events_user = $request->user()->events();
// $events = Event::with('user')

        $events = $events_user
        ->filter(request(['search']))
        ->latest()
        ->paginate(7)
        ->withQueryString();
    
        return Inertia::render('Event/Dashboard',[
            'events' => $events,
            'search' => $request->search,
            'status' => session('status')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Event/Create',[
            'status' => session('status')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());

       $field = $request->validate([
        'title' => 'required|min:5',
        'email' => 'required|email',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'speaker_image' => 'required|mimes:jpg,jpeg,png|max:10240',
        'speaker' => 'required|min:3|max:225',
        'price' => 'required',
        'hall' => 'required',
        'seat' => 'required|integer|max:1000',
        'phone_no' => 'required',
        'details' => 'required',
        'type' => 'required'
       ]);

       if($request->hasFile('speaker_image')){
        $field['speaker_image'] = Storage::disk('public')->put('image',  $request->speaker_image);
       }

  $value = $request->user()->events()->create($field);


  if($value->save()){
    return back()->with([
        'status' => 'Event created successfully',
    ]);
  } else {
    return back()->with([
        'status' => 'Error',
    ]);
  }

  

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return Inertia::render('Event/Show',[
            'event' => $event,
            'status' => session('status')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return Inertia::render('Event/Edit',[
            'event' => $event,
            'status' => session('status')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Format time BEFORE validation
        if ($request->has('time')) {
            $request->merge(['time' => date('H:i', strtotime($request->time))]);
        }
    
        $field = $request->validate([
            'title' => 'nullable|min:5',
            'email' => 'nullable|email',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i', 
            'speaker_image' => 'nullable|mimes:jpg,jpeg,png|max:10240',
            'speaker' => 'nullable|min:3|max:225',
            'price' => 'nullable',
            'hall' => 'nullable',
            'seat' => 'nullable|integer|max:1000',
            'phone_no' => 'nullable',
            'details' => 'nullable',
            'type' => 'nullable'
        ]);
    
        if ($request->hasFile('speaker_image')) {
            if ($event->speaker_image) {
                Storage::disk('public')->delete($event->speaker_image);
            }
            $field['speaker_image'] = Storage::disk('public')->put('image', $request->speaker_image);
        } else {
            $field['speaker_image'] = $event->speaker_image;
        }
    
        $value = $event->update([...$field, 'progress' => 'pending']);
    
        if ($value) {
            return back()->with([
                'status' => 'Event updated successfully',
            ]);
        } else {
            return back()->with([
                'status' => 'Error',
            ]);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        

       

    if($event->speaker_image){
        Storage::disk('public')->delete( $event->speaker_image);
    }

    $event->delete();
  

    return back()->with([
        'status' => 'Deleted sucessful'
    ]);




    }
}
