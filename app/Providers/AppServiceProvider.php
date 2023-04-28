<?php

namespace App\Providers;

use App\Contracts\FileSystemInterface;
use App\Contracts\UserInterface;
use App\Services\FileSystemService;
use App\Services\UserService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
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
        $this->app->bind(UserInterface::class, UserService::class);
        $this->app->bind(FileSystemInterface::class, FileSystemService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::disk('local')->buildTemporaryUrlsUsing(function ($path, $expiration, $options) {
            return URL::temporarySignedRoute('get.image.path', $expiration, array_merge($options, ['path' => $path]));
        });
    }
}
