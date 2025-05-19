<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletters = Newsletter::latest()->get();
        return view('admin.dashboard.newsletter.index', compact('newsletters'));
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
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName(); // example: 1747434186_deputy.jpg
        $image->move(public_path('assets/img/newsletter'), $filename); // store in public folder
    
        Newsletter::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'assets/img/newsletter/' . $filename, // this path can be used directly in <img src="{{ asset(...) }}">
        ]);
    
        return redirect()->back()->with('success', 'Newsletter added successfully!');
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
    public function edit($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        return view('admin.dashboard.edit', compact('newsletter'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        $newsletter = Newsletter::findOrFail($id);
    
        $data = $request->only('title', 'description');
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/img/newsletter', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }
    
        $newsletter->update($data);
    
        return redirect()->route('newsletters.index')->with('success', 'Newsletter updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);
    
        // Optional: Delete image file if needed
        // \Storage::disk('public')->delete(str_replace('storage/', '', $newsletter->image));
    
        $newsletter->delete();
    
        return redirect()->back()->with('success', 'Newsletter deleted successfully!');
    }
    
}
