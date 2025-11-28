<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

// MODELS
use App\Models\Article;
use App\Models\Planta;
use App\Models\Product;
use App\Models\Treatment;
// POLICIES
use App\Policies\ArticlePolicy;
use App\Policies\PlantaPolicy;
use App\Policies\ProductPolicy;
use App\Policies\TreatmentPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Planta::class  => PlantaPolicy::class,
        Product::class => ProductPolicy::class,
        Treatment::class => TreatmentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
