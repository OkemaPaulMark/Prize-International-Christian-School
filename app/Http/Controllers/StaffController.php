<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Staff::paginate(7); 
        return view('admin.dashboard.staffmembers.index', compact('members'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/staff'), $filename);
        }

        Staff::create([
            'name' => $request->name,
            'title' => $request->title,
            'image' => 'assets/img/staff/' . $filename,
        ]);

        return redirect()->back()->with('success', 'Staff member added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $member = Staff::findOrFail($id);
        return view('admin.dashboard.staffmembers.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Staff::findOrFail($id);
        return view('admin.dashboard.staffmembers.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $member = Staff::findOrFail($id);
        
        $data = [
            'name' => $request->name,
            'title' => $request->title,
        ];

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            if ($member->image && file_exists(public_path($member->image))) {
                unlink(public_path($member->image));
            }
            
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/staff'), $filename);
            $data['image'] = 'assets/img/staff/' . $filename;
        }
        
        $member->update($data);
        
        return redirect()->route('staff.index')
                    ->with('success', 'Staff member updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = Staff::findOrFail($id);
    
        // Optional: Delete the image file
        if (file_exists(public_path($member->image))) {
            unlink(public_path($member->image));
        }
    
        $member->delete();
    
        return redirect()->back()->with('success', 'Staff member deleted successfully!');
    }
    
}
