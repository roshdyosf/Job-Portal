<?php

namespace App\Providers;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Events\MessageSent;
use App\Listeners\UpdateApplicationStatusOnMailSent;
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
        Model::preventLazyLoading();

        Event::listen(
            MessageSent::class,
            UpdateApplicationStatusOnMailSent::class
        );

        // Gate::define('edit-job', function (User $user, Job $job) {
        //     return $job->employer->user->is($user);

        // });
    }
}
