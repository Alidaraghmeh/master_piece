<?php
// app/Http/Controllers/EventsubController.php

namespace App\Http\Controllers;
// app/Http/Controllers/EventsubController.php

use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Eventssub;

class EventsubController extends Controller
{
    public function join(Event $event)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Get the logged-in user's email and name from the session
            $userEmail = Auth::user()->email;
            $userName = Auth::user()->name;

            // Check if the user has already joined the event
            $existingEventSub = Eventssub::where('email_u', $userEmail)
                ->where('name_event', $event->name_event)
                ->first();

            if ($existingEventSub) {
                // User has already joined the event, display a message
                return redirect()->back()->with('info', 'You have already joined this event.');
            }

            // Save the data in the eventssub table
            Eventssub::create([
                'email_U' => $userEmail,
                'name_U' => $userName,
                'name_event' => $event->name_event,
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'You have successfully joined the event.');
        } else {
            // If the user is not logged in, redirect to the login page with an error message
            return redirect()->route('ali')->with('error', 'You must be logged in to join the event.');
        }
    }
}

