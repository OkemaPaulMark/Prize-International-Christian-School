<?php

namespace App\Http\Controllers;
use App\Models\Newsletter;
use App\Models\BoardMember; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $members = BoardMember::all(); // Fetch board members
        $newsletters = Newsletter::latest()->get(); // fetch all newsletters, newest first
        return view('user.home', compact('newsletters', 'members')); // Pass to the view
    }
}
