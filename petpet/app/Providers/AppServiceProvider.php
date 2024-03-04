<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(); 

        //로그인시 이전 페이지로 돌아가게 하는 기능
        view()->composer('auth.login', function ($view) {
            $login_url = route('login');
            $intend_url = url()->previous();

            if ($intend_url === $login_url) {
                $intend_url = route('home');
            }

            session(['url.intended' => $intend_url]);
        });
    }
}
