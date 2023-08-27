<?php

namespace App\Http\Controllers;

use App\Models\Event; // Import the Event model

class EventController extends Controller
{
    public function showEvents()
    {
        // Get paginated events from the database
        $events = Event::all(); // Show 6 events per page

        return view('events', compact('events'));
    }
    public function lastThreeEvents()
    {
        $lastThreeEvents = Event::orderBy('id', 'desc')->take(3)->get();
    
        return view('index', compact('lastThreeEvents'));
    }
    
    
}

