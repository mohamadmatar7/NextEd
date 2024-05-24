<?php

namespace App\Providers;


// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Enums\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // define a gate to check if the user is an admin
        // Gate::define('is-admin', function ($user) {
        //     return $user->role === 4;
        // });

        // // define a gate to check if the user is a principal
        // Gate::define('is-principal', function ($user) {
        //     return $user->role === 3;
        // });

        // // define a gate to check if the user is a admin or principal
        // Gate::define('is-admin-or-principal', function ($user) {
        //     return $user->role === 4 || $user->role === 3;
        // });

        // // define a gate to check if the user is an instructor
        // Gate::define('is-instructor', function ($user) {
        //     return $user->role === 2;
        // });

        // // define a gate to check if the user is a teacher
        // Gate::define('is-teacher', function ($user) {
        //     return $user->role === 1;
        // });

        // // define a gate to check if the user is a instructor or teacher
        // Gate::define('is-instructor-or-teacher', function ($user) {
        //     return $user->role === 2 || $user->role === 1;
        // });

        // Define gates using roles from the Role enum
        Gate::define('is-admin', fn($user) => $user->role === Role::ADMIN);
        Gate::define('is-principal', fn($user) => $user->role === Role::PRINCIPAL);
        Gate::define('is-admin-or-principal', fn($user) => in_array($user->role, [Role::ADMIN, Role::PRINCIPAL]));
        Gate::define('is-instructor', fn($user) => $user->role === Role::INSTRUCTOR);
        Gate::define('is-teacher', fn($user) => $user->role === Role::TEACHER);
        Gate::define('is-instructor-or-teacher', fn($user) => in_array($user->role, [Role::INSTRUCTOR, Role::TEACHER]));
        Gate::define('is-administrator', fn($user) => in_array($user->role, [Role::ADMIN, Role::PRINCIPAL, Role::INSTRUCTOR, Role::TEACHER]));
        Gate::define('is-student', fn($user) => $user->role === Role::STUDENT);
    }
}
