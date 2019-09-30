<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private function bootMecasSocialite()
    {
        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'mecas',
            function ($app) use ($socialite) {
                $config = $app['config']['services.mecas'];
                return $socialite->buildProvider(MecasAuthProvider::class, $config);
            }
        );
    }

    private function bootBoxBoxSocialite()
    {
        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'boxbox',
            function ($app) use ($socialite) {
                $config = $app['config']['services.boxbox'];
                return $socialite->buildProvider(BoxBoxAuthProvider::class, $config);
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootMecasSocialite();

        $this->bootBoxBoxSocialite();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
