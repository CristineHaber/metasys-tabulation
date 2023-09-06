<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the common fields
        $validated = $request->validate([
            'event_name' => 'required',
            'event_place' => 'required',
            'event_date' => 'required',
            'num_judges' => 'required|integer|min:1',
            // 'num_candidates' => 'required|integer|min:1',
            // 'num_rounds' => 'required|integer|min:1',
            'event_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ]);
    
        // Add user_id to the validated data
        $validated['user_id'] = auth()->id();
    
        // Store the event logo
        if ($request->hasFile('event_logo')) {
            $validated['event_logo'] = $request->file('event_logo')->store('logos', 'public');
        }
    
        // Create the event
        $event = Event::create($validated);
    
        // Create judges, participants, and rounds based on the entered numbers
        for ($i = 1; $i <= $validated['num_judges']; $i++) {
            $judgeName = $request->input('judge_name' . $i);
            $judgeNumber = $request->input('judge_number' . $i);
            $event->judges()->create([
                'judge_name' => $judgeName,
                'judge_number' => "$judgeNumber",
                'judge_username' => $judgeName, // Set the username as the judge's name
                'judge_password' => bcrypt($judgeName), // Set the password as the hashed judge's name
                'judge_status' => "Active", // You can set the initial status here
            ]);
        }
    
        return redirect()->route('admin.events.index')->with('message', 'Event created successfully!');
    }
    
    


    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('message', 'Event deleted successfully!');
    }
}
