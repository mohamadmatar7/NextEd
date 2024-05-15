<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth', 'verified'])->group(function () {
    // Route to the user's dashboard based on their role
    Route::get('/dashboard', function () {
        $user_role = Auth::user()->role;

        switch ($user_role) {
            case 0:
                return view('roles.student.dashboard');
                break;
            case 1:
                return view('roles.teacher.dashboard');
                break;
            case 2:
                return view('roles.instructor.dashboard');
                break;
            case 3:
                return view('roles.principal.dashboard');
                break;
            case 4:
                return view('roles.admin.dashboard');
                break;
        }
    })->name('dashboard');

    // Route to the home page 'the user must be logged in'
    Route::get('/', [App\Http\Controllers\General::class, 'index'])->name('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // likes
    Route::post('/like/comment/{comment}', [LikeController::class, 'likeComment'])->name('like.comment');
    Route::post('/like/reply/{reply}', [LikeController::class, 'likeReply'])->name('like.reply');
    Route::post('/like/post/{post}', [LikeController::class, 'likePost'])->name('like.post');

    // announcements
    Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
    Route::patch('/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
    Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
    Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');



    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});

require __DIR__.'/auth.php';
