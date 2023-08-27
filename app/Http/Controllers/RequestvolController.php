<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requestvol;

class RequestvolController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name_user' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
        ]);

        Requestvol::create([
            'name_user' => $request->name_user,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success', 'Your request has been submitted successfully.');
    }
}
