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
    public function show($id)
    {
        $member = BoardMember::findOrFail($id);
        return view('admin.dashboard.boardmembers.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = BoardMember::findOrFail($id);
        return view('admin.dashboard.boardmembers.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'phone_number' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $member = BoardMember::findOrFail($id);
        
        $data = [
            'name' => $request->name,
            'title' => $request->title,
            'phone_number' => $request->phone_number,
        ];

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($member->image && file_exists(public_path($member->image))) {
                unlink(public_path($member->image));
            }
            
            // Store new image (consistent with store method)
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/team'), $filename);
            $data['image'] = 'assets/img/team/' . $filename;
        }
        
        $member->update($data);
        
        return redirect()->route('boardmembers.index')
                    ->with('success', 'Board member updated successfully');
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
