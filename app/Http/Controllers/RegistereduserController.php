<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistereduserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $users = User::orderBy('created_at', 'desc')->get(); // Or paginate if needed
         return view('admin.dashboard.users.index', compact('users'));
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
        //
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
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'role' => 'required|in:admin,user', // validate that role is either admin or user
            ]);

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();

            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        }



    /**
     * Remove the specified resource from storage.
     */

     public function destroy($id)
     {
         $user = User::findOrFail($id);
         
         // Optional: Prevent deletion of currently logged-in admin
         if (auth()->id() == $user->id) {
             return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
         }
     
         $user->delete();
     
         return redirect()->route('users.index')->with('success', 'User deleted successfully.');
     }
}
