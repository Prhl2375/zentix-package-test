<?php
declare(strict_types=1);

namespace Prhl2375\ZentixPackageTest;

use Illuminate\Support\ServiceProvider;
use Prhl2375\ZentixPackageTest\Console\Commands\SeedContactsCommand;


class ZentixPackageTestServiceProvider extends ServiceProvider{
    public function boot(): void
    {
       $this->loadViewsFrom(__DIR__.'/../resources/views', 'zentixpackage');
       $this->loadRoutesFrom(__DIR__.'/routes/web.php');
       $this->loadMigrationsFrom(__DIR__.'/database/migrations');
       $this->commands([
           SeedContactsCommand::class,
       ]);

       $this->publishes([
        __DIR__.'/../public' => public_path('prhl2375/zentix-package-test'),
        ], 'zentixpackage-assets');
    }
}
