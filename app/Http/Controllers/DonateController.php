<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// app/Http/Controllers/DonationController.php
use App\Models\Donate;

class DonateController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'NID' => 'required|digits:10',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|digits:16',
            'amount' => 'required|',

        ]);

        // Create a new donation instance and save it to the database
        $donation = new Donate();
        $donation->name = $validatedData['name'];
        $donation->NID = $validatedData['NID'];
        $donation->phone = $validatedData['phone'];
        $donation->email = $validatedData['email'];
        $donation->card_name = $validatedData['card_name'];
        $donation->card_number = $validatedData['card_number'];
        $donation->amount = $validatedData['amount'];
        $donation->save();

        Session::flash('success', 'Donation successfully');

        // Redirect the user to a success page or perform other actions as needed
        return redirect()->route('ali');
         
    }
}

