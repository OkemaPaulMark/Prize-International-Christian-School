<?php

namespace App\Http\Controllers;
use App\Models\Newsletter;
use App\Models\BoardMember; 
use App\Models\Staff;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $members = BoardMember::all(); // Fetch board members
        $staff = Staff::all(); // Fetch staff members
        $newsletters = Newsletter::latest()->get(); // fetch all newsletters, newest first
        return view('user.home', compact('newsletters', 'members', 'staff')); // Pass to the view
    }
}
