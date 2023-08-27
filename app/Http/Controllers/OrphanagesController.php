<?php


namespace App\Http\Controllers;

use App\Models\Orphanage; // Import the Orphanage model

class OrphanagesController extends Controller
{
    public function showOrphanages()
    {
        // Get paginated orphanages from the database
        $orphs = Orphanage::all(); // Show 6 orphanages per page

        return view('orphanages', compact('orphs'));
    }
}
 
