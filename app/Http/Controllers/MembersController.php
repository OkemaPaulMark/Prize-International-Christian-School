<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardMember;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = BoardMember::all();
        return view('admin.dashboard.boardmembers.index', compact('members'));
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
            'name' => 'required|string',
            'title' => 'required|string',
            'phone_number' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/team'), $filename);
        }
    
        BoardMember::create([
            'name' => $request->name,
            'title' => $request->title,
            'phone_number' => $request->phone_number,
            'image' => 'assets/img/team/' . $filename,
        ]);
    
        return redirect()->back()->with('success', 'Board member added successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = BoardMember::findOrFail($id);
    
        // Optional: Delete the image file
        if (file_exists(public_path($member->image))) {
            unlink(public_path($member->image));
        }
    
        $member->delete();
    
        return redirect()->back()->with('success', 'Board member deleted successfully!');
    }
    
}
