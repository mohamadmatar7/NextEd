<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;

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

    // announcements+
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
    Route::patch('/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
    Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
    Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');


    // courses
    Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [App\Http\Controllers\CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [App\Http\Controllers\CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}', [App\Http\Controllers\CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/edit', [App\Http\Controllers\CourseController::class, 'edit'])->name('courses.edit');
    Route::patch('/courses/{course}', [App\Http\Controllers\CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('courses.destroy');
    // course showByUser
    Route::get('/courses/user/{user_id}', [App\Http\Controllers\CourseController::class, 'showByUser'])->name('courses.showByUser');
    // course showByProgram
    Route::get('/courses/program/{program_id}/user/{user_id}', [App\Http\Controllers\CourseController::class, 'showByProgram'])->name('courses.showByProgram');  
    // assignments of a course
    Route::get('/courses/{course}/assignments', [App\Http\Controllers\AssignmentController::class, 'showAssignments'])->name('courses.showAssignments');
    // announcements of a course
    Route::get('/courses/{course}/announcements', [App\Http\Controllers\AnnouncementController::class, 'showAnnouncements'])->name('courses.showAnnouncements');
    // users of a course
    Route::get('/courses/{course}/users', [App\Http\Controllers\CourseController::class, 'showUsers'])->name('courses.showUsers');
    // lessons of a course
    Route::get('/courses/{course}/lessons', [App\Http\Controllers\CourseController::class, 'showLessons'])->name('courses.showLessons');
    Route::get('/courses/{course}/lessons/{lesson}', [App\Http\Controllers\LessonController::class, 'show'])->name('courses.showLesson');
    // assignments of a course
    Route::get('/courses/{course}/assignments', [App\Http\Controllers\CourseController::class, 'showAssignments'])->name('courses.showAssignments');
    Route::get('/courses/{course}/assignments/{assignment}', [App\Http\Controllers\CourseController::class, 'showAssignment'])->name('courses.showAssignment');


    // programs
    Route::get('/programs', [App\Http\Controllers\ProgramController::class, 'index'])->name('programs.index');
    Route::get('/programs/create', [App\Http\Controllers\ProgramController::class, 'create'])->name('programs.create');
    Route::post('/programs', [App\Http\Controllers\ProgramController::class, 'store'])->name('programs.store');
    Route::get('/programs/{program}', [App\Http\Controllers\ProgramController::class, 'show'])->name('programs.show');
    Route::get('/programs/{program}/edit', [App\Http\Controllers\ProgramController::class, 'edit'])->name('programs.edit');
    Route::patch('/programs/{program}', [App\Http\Controllers\ProgramController::class, 'update'])->name('programs.update');
    Route::delete('/programs/{program}', [App\Http\Controllers\ProgramController::class, 'destroy'])->name('programs.destroy');
    // program showByUser
    Route::get('/programs/user/{user_id}', [App\Http\Controllers\ProgramController::class, 'showByUser'])->name('programs.showByUser');


    // users
    Route::get('/users', [App\Http\Controllers\ProfileController::class, 'index'])->name('users.index');
    // user showByRoles
    Route::get('/users/role', [App\Http\Controllers\ProfileController::class, 'showByUserRoles'])->name('users.showByRoles');
    // user showByRole
    Route::get('/users/role/{role}', [App\Http\Controllers\ProfileController::class, 'showByRole'])->name('users.showByRole');





    // comments
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});

require __DIR__.'/auth.php';
