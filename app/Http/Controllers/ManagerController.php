<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $users = User::where('roles', 'admin')->get();
        return view('managers.list', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('managers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        $this->authorize('create', $user);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles = 'admin';
        // Set other user properties as needed
        $user->save();

        return redirect()->route('managers.index')->with('success', 'Manager created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $manager)
    {
        return view('managers.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $manager)
    {
        //
        $this->authorize('update', $manager);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $manager->id,
            'password' => 'nullable|min:6',
        ]);

        $manager->name = $request->input('name');
        $manager->email = $request->input('email');



        // Update other properties as needed

        $manager->save();

        return redirect()->route('managers.index')->with('success', 'Manager updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $manager)
    {
        //
        $this->authorize('delete', $manager);
        // Delete the manager
        $manager->delete();

        // Redirect back to the index page or any other appropriate page
        return redirect()->route('managers.index')->with('success', 'Manager deleted successfully');
    }
}
