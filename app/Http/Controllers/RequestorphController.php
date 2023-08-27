<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RequestOrph;
use App\Models\Orphan;
use App\Models\Orphanage;
use Illuminate\Support\Facades\Auth;

class RequestorphController extends Controller
{
    // Your existing code for other methods
    public function show($orphan_id, $orphanage_id)
    {
        // Fetch the required data based on the provided IDs
        $orphan = Orphan::find($orphan_id);
        $orphanage = Orphanage::find($orphanage_id);
        
        // Pass the data to the view and load the "request orph" page
        return view('request-orph', compact('orphan', 'orphanage'));
    }
    function store(Request $request, Orphan $orphan, $orphanageId)
    {
        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:10',
            'amount' => 'required|numeric',
            'address' => 'required|string|max:255',
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|digits:16',
        ]);
    
        // Get the authenticated user's name from the session
        $userName = Auth::user()->name;
    
        // Get the orphan data from the $orphan object
        $orphanData = $orphan;
    
        // Make sure the orphan data exists
        if (!$orphanData) {
            return response()->json(['message' => 'Orphan not found.'], 404);
        }
    
        // Get the orphanage data from the database using the $orphanageId
        $orphanageData = Orphanage::find($orphanageId);
    
        // Make sure the orphanage data exists
        if (!$orphanageData) {
            return response()->json(['message' => 'Orphanage not found.'], 404);
        }
    
        $existingRequest = RequestOrph::where('name_orphan', $orphanData->name)
            ->where('name_orphange', $orphanageData->name)
            ->where('name_user', $userName)
            ->first();
    
        if ($existingRequest) {
            return redirect()->back()->with('error', 'You have already sponsored this orphan.');
        }
    
        // Store the sponsorship request in the RequestOrph table
        RequestOrph::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'amount' => $request->input('amount'),
            'address' => $request->input('address'),
            'card_number' => $request->input('card_number'),
            'card_name' => $request->input('card_name'),
            'name_user' => $userName,
            'name_orphan' => $orphanData->name,
            'name_orphange' => $orphanageData->name,
            'id_orphange' => $orphanageId,
            'id_orphan' => $orphanData->id,
        ]);
    
        return redirect()->route('orphans', ['orphanage' => $orphanageId])->with('success', 'Orphans Sponsored successfully.');
    }
}
