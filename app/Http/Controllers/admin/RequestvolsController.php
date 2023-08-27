<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requestvol;

class RequestvolsController extends Controller
{
    public function index()
    {
        $requestVols = Requestvol::all();
        return view('admin.volunteer', compact('requestVols'));
    }
}
