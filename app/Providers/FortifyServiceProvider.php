<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
                // tetapkan lokasi view untuk login
                Fortify::loginView(function () 
                {
                    return view('admin.login');
                });
                // tetapkan lokasi view untuk register
                Fortify::registerView(function () 
                {
                    return view('admin.register');
                });
                // tetapkan lokasi view untuk forgot-password
                Fortify::requestPasswordResetLinkView(function () 
                {
                    return view('auth.forgot-password');
                });
                // tetapkan lokasi view untuk reset-password
                Fortify::resetPasswordView(function ($request) 
                {
                    return view('admin.reset-password', ['request' =>$request]);
                });
    }
}
