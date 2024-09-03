<?php

namespace App\Providers;

use App\Models\Veiculo;
use App\Policies\VeiculoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Model => Policy
        Veiculo::class => VeiculoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // You can add additional authentication or authorization logic here
    }
}
