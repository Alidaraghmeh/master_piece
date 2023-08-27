<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_event' => 'required|string|max:255',
            'date_event' => 'required|date',
            'time_event' => 'required',
            'time_event1' => 'required',
            'address_event' => 'required|string|max:255',
            'description_event' => 'required|string',
            'name_orphanage' => 'required|string|max:255',
            'image_event' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageFile = $request->file('image_event');
        $imageName = $imageFile->getClientOriginalName(); // Gets the name with extension
        
        // Now $imageName contains the name of the image with the extension
        
        // Now you can use $imageName to save it in the 'image_event' field of your model
        
        Event::create([
            'name_event' => $request->name_event,
            'date_event' => $request->date_event,
            'time_event' => $request->time_event,
            'time_event1' => $request->time_event1,
            'address_event' => $request->address_event,
            'description_event' => $request->description_event,
            'name_orphanage' => $request->name_orphanage,
            'image_event' => $imageName,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name_event' => 'required|string|max:255',
            'date_event' => 'required|date',
            'time_event' => 'required',
            'time_event1' => 'required',
            'address_event' => 'required|string|max:255',
            'description_event' => 'required|string',
            'name_orphanage' => 'required|string|max:255',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
