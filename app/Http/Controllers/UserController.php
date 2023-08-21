<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|string',
        ]);

        // Create a new user
        $user = User::create($validatedData);

        // You can also calculate and update the total and subtotal here if needed
        session()->flash('success', 'User added successfully.');
        return redirect()->back()->with('success', 'User data saved successfully.');
    }
    
}
