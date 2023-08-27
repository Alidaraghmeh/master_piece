<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session; // Import the Session facade
use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user instance and save it to the database
        $user = new User();
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']); 
        $user->role_id = 1; // Set the appropriate role ID here
        // Hash the password for security
        $user->save();

        // Create a session with the user's ID
        Session::put('user_id', $user->id);
        // You can also add more data to the session if needed
        Session::put('user_name', $user->name);

        // Redirect the user to a success page or perform other actions as needed
        return redirect()->route('login');
    }
}
