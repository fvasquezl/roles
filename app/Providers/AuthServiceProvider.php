<?php

namespace App\Providers;

use App\Post;
use App\User;
use App\Department;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\HomePolicy;
use App\Policies\DepartmentPolicy;
use App\Policies\PermissionPolicy;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        Department::class => DepartmentPolicy::class,
        // Post::class => HomePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('public-post', function ($user, Post $post) {
            $post_dep = $post->departments()->pluck('department_id')->implode(', ');
                return $user->departments()->pluck('department_id')->contains($post_dep) 
               || $user->hasPermissionTo('View posts') || $post->departments()->pluck('department_id')->isEmpty();
        });
    }
}
