<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts', compact('contacts'));
    }
}
