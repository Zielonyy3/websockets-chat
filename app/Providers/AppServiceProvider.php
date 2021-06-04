<?php

namespace App\Providers;

use App\Repositories\Contracts\MessageRepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\MessageRepository;
use App\Repositories\UserRepository;
use App\Services\Contracts\MessageServiceContract;
use App\Services\Contracts\UserServiceContract;
use App\Services\MessageService;
use App\Services\UserService;
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
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(UserServiceContract::class, UserService::class);
        $this->app->bind(MessageServiceContract::class, MessageService::class);
        $this->app->bind(MessageRepositoryContract::class, MessageRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
