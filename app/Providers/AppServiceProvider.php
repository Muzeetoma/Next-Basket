<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;
use App\Repositories\UserRepository;
use App\Core\ValidatorService;
use App\Core\RabbitMQService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserService::class, function ($app) {
            $userRepository = $app->make(UserRepository::class);
            $rabbitMQService = $app->make(RabbitMQService::class);
            return new UserService($userRepository, $rabbitMQService);
        });
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository();
        });
        $this->app->bind(ValidatorService::class, function ($app) {
            return new ValidatorService();
        });
        $this->app->bind(RabbitMQService::class, function ($app) {
            return new RabbitMQService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
