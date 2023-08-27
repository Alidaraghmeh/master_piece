<?php
// app/Http/Controllers/SalesController.php

namespace App\Http\Controllers;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|digits:10',
            'card_name' => 'required|string',
            'card_number' => 'required|digits:16',
        ]);

     
        
        // Create a new Sale instance and save it to the database
        $sale = new Sale();
        $sale->buyer_name = $request->input('name');
        $sale->buyer_phone = $request->input('phone');
        $sale->card_name = $request->input('card_name');
        $sale->card_number = $request->input('card_number');
        $sale->total = $request->input('total_price');

        // Save the sale record in the database
        $sale->save();

      
        // Redirect to the checkout page and pass the total price and product names as data
        return back()->with('success', 'Checkout successful!');
    }
}
