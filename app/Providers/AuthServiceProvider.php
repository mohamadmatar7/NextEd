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
