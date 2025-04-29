<?php

namespace App\Providers;

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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-joc', function ($user) {
            dd($user); // Imprime el objeto $user
            // dd($user->is_admin); // Elimina o comenta esto por ahora
            return $user->is_admin == 1;
        });

        Gate::define('delete-joc', function ($user) {
            return $user->is_admin == 1; // Solo los usuarios con is_admin = 1 pueden eliminar
        });
    }
}
