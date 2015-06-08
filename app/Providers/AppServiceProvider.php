<?php namespace JoeCianflone\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('JoeCianflone\Contracts\StreamRepository', 'JoeCianflone\Repositories\EloquentStreamRepository');
    }
}
