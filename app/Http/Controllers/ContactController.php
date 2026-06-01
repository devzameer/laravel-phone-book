<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    /**
     * Display a listing of the resour  ce.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
    'name' => 'required|regex:/^[A-Za-z\s]+$/|min:3',
    'email' => 'required|email',
    'phone' => 'required|regex:/^\+?[0-9]{10,15}$/',
    'password' => 'required|min:8',
]);

User::create([
    'name' => $request->name,
    'address' => $request->address,
    'password' => bcrypt($request->password),
    'email' => $request->email,
    'phone' => $request->phone,
    'date_of_birth' => $request->date_of_birth,
    'notes' => $request->notes,
]);

      
    return redirect()->back()->with('success', 'Data Saved Successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }

    // ContactController.php

public function signup()
{
    return view('signup');
}


public function login()
{
    return view('login');
}



}
