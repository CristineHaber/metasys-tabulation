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
        // Fetch the latest events
        $events = Event::latest()->get();

        // Pass the events to the view
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
            'num_candidates' => 'required|integer|min:1',
            'event_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Add user_id to the validated data
        $validated['user_id'] = auth()->id();

        // Store the event logo
        if ($request->hasFile('event_logo',)) {
            $validated['event_logo'] = $request->file('event_logo')->store('storage', 'public');
        }

        if ($request->hasFile('event_banner',)) {
            $validated['event_banner'] = $request->file('event_banner')->store('storage', 'public');
        }

        // Create the event
        $event = Event::create($validated);

        // Create judges based on the entered numbers
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

        // Create participants based on the entered numbers
        for ($i = 1; $i <= $validated['num_candidates']; $i++) {
            $candidatePicture = $request->file('candidate_picture' . $i);
            $candidateName = $request->input('candidate_name' . $i);
            $candidateNumber = $request->input('candidate_number' . $i);
            $candidateAddress = $request->input('candidate_address' . $i);


            if ($candidatePicture) {
                // Store the candidate picture and get its path
                $candidatePicturePath = $candidatePicture->store('storage', 'public');
            } else {
                // Handle the case where no file was uploaded (you may want to provide a default image)
                $candidatePicturePath = 'default/path/to/your/default/image.jpg';
            }


            $event->candidates()->create([
                'candidate_name' => $candidateName,
                'candidate_picture' => $candidatePicturePath,
                'candidate_number' => $candidateNumber,
                'candidate_address' => $candidateAddress,
                'userType' => 'candidate', // Set the user type for candidates
                // Add other candidate fields as needed
            ]);
        }

        return redirect()->route('admin.events.index')->with('message', 'Event created successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        // Load any additional data or logic specific to the selected event if needed
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //\
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Validate the form data, including the updated event logo (no need to require the banner)
        $validated = $request->validate([
            'event_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow it to be nullable
            'event_banner' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Remove the 'required' rule
        ]);

        if ($request->hasFile('event_logo')) {
            $validated['event_logo'] = $request->file('event_logo')->store('storage', 'public');
        } else {
            // If event_logo file input is not provided, keep the existing event_logo value
            $validated['event_logo'] = $event->event_logo;
        }

        if ($request->hasFile('event_banner')) {
            $validated['event_banner'] = $request->file('event_banner')->store('storage', 'public');
        } else {
            // If event_banner file input is not provided, keep the existing event_banner value
            $validated['event_banner'] = $event->event_banner;
        }

        $event->update($validated);

        // Redirect to the event details page or wherever appropriate
        return redirect()->route('admin.events.show', $event->id)->with('success', 'Event details updated successfully');
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
