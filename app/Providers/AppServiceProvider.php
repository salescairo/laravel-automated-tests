<?php

namespace App\Providers;

use App\Business\Others\Divisor\ThreeOrFiveAndSevenRepository;
use App\Business\Others\Divisor\ThreeOrFiveDivisor;
use App\Business\Others\Divisor\ThreeOrFiveInterface;
use App\Business\Others\Divisor\ThreeOrFiveRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ThreeOrFiveInterface::class,ThreeOrFiveRepository::class);
        $this->app->bind(ThreeOrFiveSevenInterface::class,ThreeOrFiveAndSevenRepository::class);
    }
}
