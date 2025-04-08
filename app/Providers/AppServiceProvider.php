<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Plataforma;
use App\Models\Joc;

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
    public function boot(): void
    {
        $this->registerPolicies();

        // Define gate para usuarios administradores
        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        // Define gates para la gestión de Plataformas (solo administradores)
        Gate::define('create-plataforma', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('view-plataforma', function (?User $user, Plataforma $plataforma) {
            return true; // Todos los usuarios (invitados incluidos) pueden ver las plataformas
        });
        Gate::define('edit-plataforma', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('delete-plataforma', function (User $user) {
            return $user->is_admin;
        });

        // Define gates para la gestión de Juegos (solo administradores)
        Gate::define('create-joc', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('view-joc', function (?User $user, Joc $joc) {
            return true; // Todos los usuarios (invitados incluidos) pueden ver los juegos
        });
        Gate::define('edit-joc', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('delete-joc', function (User $user) {
            return $user->is_admin;
        });

        // Define gates para la gestión de Usuarios (solo administradores)
        Gate::define('create-user', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('view-user', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('edit-user', function (User $user, User $targetUser) {
            return $user->is_admin; // Solo el admin puede editar otros usuarios
        });
        Gate::define('delete-user', function (User $user, User $targetUser) {
            return $user->is_admin; // Solo el admin puede eliminar otros usuarios
        });

        // Gate para ver el perfil del usuario (solo el propietario puede verlo)
        Gate::define('view-profile', function (User $currentUser, User $profileUser) {
            return $currentUser->id === $profileUser->id;
        });
    }
}