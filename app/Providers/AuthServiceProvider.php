<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

          Gate::define('ver-data', function($user){
            if ($user->role == 1) {
                return true;
            } else {
                if ($user->role == 4) {
                    return true;
                } else {
                    return false;
                }
            }

          });
          Gate::define('ver-escrutinio', function($user){
            if ($user->role == 2) {
                return true;
            } else {
                if ($user->role == 1) {
                    return true;
                } else {
                    if ($user->role == 4) {
                        return true;
                    } else {
                        return false;
                    }
                }

            }


          });
          Gate::define('solo_super', function($user){
            if ($user->id == 1) {
                return true;
            } else {

                    return false;

            }

          });

    }
}
