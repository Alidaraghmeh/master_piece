<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;

class DonatesController extends Controller
{
    //
    public function index()
    {
        $donates = Donate::all();
        return view('admin.donates', compact('donates'));
    }
}
