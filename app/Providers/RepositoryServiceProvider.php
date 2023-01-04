<?php

namespace App\Providers;

use App\Repositories\fileUploaderRepository;
use App\Repositories\Interfaces\fileUploaderInterface;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(fileUploaderInterface::class, fileUploaderRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
