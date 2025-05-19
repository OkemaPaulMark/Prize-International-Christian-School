<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Newsletter;
use App\Models\BoardMember;

use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index()
{
    $data = [
        'userCount' => User::count(),
        'feedbackCount' => Feedback::count(),
        'newsletterCount' => Newsletter::count(),
        'boardMemberCount' => BoardMember::count(),
        // Add any other variables your list view needs
        'feedbacks' => Feedback::all(), // Example if you're listing feedbacks
        'newsletters' => Newsletter::all() // Example if you're listing newsletters
    ];
    
    return view('admin.list', $data);
}
}
