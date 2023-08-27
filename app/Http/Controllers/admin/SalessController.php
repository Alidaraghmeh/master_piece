<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;


class SalessController extends Controller
{
    //
    public function index()
    {
        $sales = Sale::all();
        return view('admin.sales', compact('sales'));
    }
}
