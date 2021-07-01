<?php namespace App\Providers;

use App\Repositories\Contracts\TestDataRepositoryInterface;
use App\Repositories\TestDataRepository;
use App\Test;
use App\TestInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind(TestDataRepositoryInterface::class, TestDataRepository::class);
        app()->bind(TestInterface::class, Test::class);
    }
}
