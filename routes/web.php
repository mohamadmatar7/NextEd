<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

        // ensure that the user is an admin
    Route::middleware('can:is-admin-or-principal')->group(function () {
        // create category
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

        // create program
        Route::get('/programs/create', [ProgramController::class, 'create'])->name('programs.create');
        Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');
        Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
        Route::patch('/programs/{program}', [ProgramController::class, 'update'])->name('programs.update');

        // create course
        Route::get('/programs/{program}/courses/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/programs/{program}/courses', [CourseController::class, 'store'])->name('courses.store');

        // destroy program
        Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
        // user destroy
        Route::delete('/users/role/{role}/{user}', [UserController::class, 'destroySpecificUser'])->name('users.destroySpecificUser');
        // user destroy from course
        Route::delete('/courses/{course}/users/{user}', [CourseController::class, 'destroyUserFromCourse'])->name('courses.destroyUserFromCourse');
        // getStudentsToAddToCourse
        Route::get('/programs/{program}/courses/{course}/students', [CourseController::class, 'getStudentsToAdd'])->name('courses.getStudentsToAdd');
        // store students in course
        Route::post('/courses/{course}/store-students', [CourseController::class, 'storeStudentsToCourse'])->name('courses.storeStudentsToCourse');
        // store administrators in course
        Route::post('/courses/{course}/store-administrators', [CourseController::class, 'storeAdministratorsToCourse'])->name('courses.storeAdministratorsToCourse');
        // storeCoursesToUser
        Route::post('/users/{user}/store-courses', [UserController::class, 'storeCoursesToUser'])->name('users.storeCoursesToUser');

        Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
        Route::patch('/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
        Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
    });

    // ensure that the user is an administrator
    Route::middleware('can:is-administrator')->group(function () {
        // categories
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        // show category
        Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
        // users
        Route::get('/users', [ProfileController::class, 'index'])->name('users.index');
        // user showByRoles
        Route::get('/users/role', [UserController::class, 'showByUserRoles'])->name('users.showByRoles');
        // user showByRole
        Route::get('/users/role/{role}', [UserController::class, 'showByRole'])->name('users.showByRole');
        Route::get('/programs/{program}/courses/{course}/lessons/{lessonId}/attendance', [AttendanceController::class, 'showAttendanceForm'])->name('courses.lessons.attendance.form');
        Route::post('/programs/{program}/courses/{course}/lessons/{lessonId}/attendance', [AttendanceController::class, 'submitAttendance'])->name('attendance.submit');

        // create announcement
        Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
        Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');


    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // show specific user
    Route::get('/users/role/{role}/{user}', [UserController::class, 'showSpecificUser'])->name('users.showSpecificUser');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/community', [PostController::class, 'index'])->name('posts.index');

    // likes
    Route::post('/like/comment/{comment}', [LikeController::class, 'likeComment'])->name('like.comment');
    Route::post('/like/reply/{reply}', [LikeController::class, 'likeReply'])->name('like.reply');
    Route::post('/like/post/{post}', [LikeController::class, 'likePost'])->name('like.post');

    // announcements+
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/announcements/program', [AnnouncementController::class, 'showAnnouncementsByUserProgram'])->name('announcements.showByUserProgram');

    Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');


    // courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    // Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    // Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/programs/{program}/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::patch('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
    // course showByUser
    Route::get('/courses/user/{user_id}', [CourseController::class, 'showByUser'])->name('courses.showByUser');
    // course showByProgram
    Route::get('/courses/program/{program_id}/user/{user_id}', [CourseController::class, 'showByProgram'])->name('courses.showByProgram');  
    // assignments of a course
    Route::get('/programs/{program}/courses/{course}/assignments', [CourseController::class, 'showAssignments'])->name('courses.assignments.showAssignments');
    Route::get('/programs/{program}/courses/{course}/assignments/{assignment}', [CourseController::class, 'showAssignment'])->name('courses.assignments.showAssignment');
    // Assignments of user 
    Route::get('/programs/{program}/courses/{course}/assignments/user/{user_id}', [CourseController::class, 'showAssignmentsByUser'])->name('courses.assignments.showAssignmentsByUser');
    Route::get('/programs/{program}/courses/{course}/assignments/{assignment}/user/{user_id}', [CourseController::class, 'showAssignmentByUser'])->name('courses.assignments.showAssignmentByUser');
    // announcements of a course
    Route::get('/programs/{program}/courses/{course}/announcements', [CourseController::class, 'showAnnouncements'])->name('courses.announcements.showAnnouncements');
    Route::get('/programs/{program}/courses/{course}/announcements/{announcement}', [CourseController::class, 'showAnnouncement'])->name('courses.announcements.showAnnouncement');
    // users of a course
    Route::get('/courses/{course}/users', [CourseController::class, 'showUsers'])->name('courses.showUsers');
    // lessons of a course
    Route::get('/programs/{program}/courses/{course}/lessons', [CourseController::class, 'showLessons'])->name('courses.lessons.showLessons');
    Route::get('/programs/{program}/courses/{course}/lessons/{lesson}', [LessonController::class, 'show'])->name('courses.lessons.showLesson');
    // assignments of a course
    Route::get('/courses/{course}/assignments', [CourseController::class, 'showAssignments'])->name('courses.showAssignments');
    Route::get('/courses/{course}/assignments/{assignment}', [CourseController::class, 'showAssignment'])->name('courses.showAssignment');
    // users of a course
    Route::get('/courses/{course}/users', [CourseController::class, 'showUsers'])->name('courses.showUsers');
    // administrators of a course
    Route::get('/programs/{program}/courses/{course}/administrators', [CourseController::class, 'showAdministrators'])->name('courses.showAdministrators');
    // students of a course
    Route::get('/programs/{program}/courses/{course}/students', [CourseController::class, 'showStudents'])->name('courses.showStudents');

    // programs
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
    Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');
    // program showByUser
    Route::get('/programs/user/{user_id}', [ProgramController::class, 'showByUser'])->name('programs.showByUser');
    // program showYear
    Route::get('/programs/{program}/year/{year}', [ProgramController::class, 'showYear'])->name('programs.showYear');

    // comments
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

});

require __DIR__.'/auth.php';
