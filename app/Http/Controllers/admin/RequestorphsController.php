<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requestorph;
class RequestorphsController extends Controller
{
    //
    public function index()
    {
        $requestOrphs = Requestorph::all();
        return view('admin.requestorph', compact('requestOrphs'));
    }
}
