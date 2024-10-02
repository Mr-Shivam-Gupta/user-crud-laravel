<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
      $title ='User List'; 
      $users = User::all();
      return view('user.index',compact(['title','users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title ='Add User'; 
      return view('user.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email',
            'mobile' => 'required|digits:10|numeric|unique:users,mobile',
            'address' => 'required|string|max:255',
        ]);
    
       $user = User::create($validatedData);
       if ($user) {
        return redirect()->route('user.index')->with('success', 'User created successfully.');
       } else {
        return redirect()->route('user.create')->with('error', 'Unable to create User, Please try again.');
       }
        
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,'.$id,
            'mobile' => 'required|digits:10|numeric|unique:users,mobile,'.$id,
            'address' => 'required|string|max:255',
        ]);
    
        // Find the user by ID and update the fields
        $user = User::findOrFail($id);
        $user->update($validatedData);

        // $user->name = $request->input('name');
        // $user->mobile = $request->input('mobile');
        // $user->email = $request->input('email');
        // $user->address = $request->input('address');
        // $user->save();
    
        // Redirect back with success message
        return redirect()->route('user.index')->with('success', 'User has been successfully updated.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('user.index')->with('success', 'User has been successfully deleted.');
}

}
