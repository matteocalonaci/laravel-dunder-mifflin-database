<?php

namespace App\Providers;

use App\Models\Customer;
use App\Policies\CustomerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Customer::class => CustomerPolicy::class,
        // Aggiungi altre Policies qui
        // Esempio: 'App\Models\Post' => 'App\Policies\PostPolicy',
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
{
    $this->registerPolicies();

    // Esempio di Gate per admin
    Gate::define('access-admin-area', function ($user) {
        return $user->isAdmin();
    });
}

}
