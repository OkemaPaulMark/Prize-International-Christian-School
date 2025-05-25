<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistereduserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::resource('users', RegistereduserController::class);

Route::resource('feedbacks', FeedbackController::class);

Route::resource('newsletter', NewsletterController::class);

Route::resource('boardmembers', MembersController::class);

Route::resource('feedback', FeedbackController::class)->only(['store']);

Route::get('/faqs', function () {
    return view('user.sections.faqs');
})->name('faqs');



require __DIR__.'/auth.php';
