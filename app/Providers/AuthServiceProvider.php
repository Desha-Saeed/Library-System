<?php

namespace App\Providers;

use App\Models\books;
use App\Policies\BooksPolicy;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //

        Category::class => CategoryPolicy::class,
        books::class => BooksPolicy::class,
        User::class => UserPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('manage-categories', [CategoryPolicy::class, 'viewAny']);
        Gate::define('manage-books', [BooksPolicy::class, 'viewAny']);
        Gate::define('manage-managers', [UserPolicy::class, 'viewAny']);
    }
}
