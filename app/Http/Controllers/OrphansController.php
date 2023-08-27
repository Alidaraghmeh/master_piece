<?php

namespace App\Http\Controllers;

use App\Models\Orphan; // Import the Orphan model
use App\Models\Orphanage;
use App\Models\RequestOrph;
use Illuminate\Support\Facades\Auth;

class OrphansController extends Controller
{
    public function showOrphans(Orphanage $orphanage)
    {
        $orphans = Orphan::where('id_orphange', $orphanage->id)->get();

        return view('Orphans', compact('orphans', 'orphanage'));
    }
    

}

