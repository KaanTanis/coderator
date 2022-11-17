<?php

namespace KaanTanis\Coderator;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use KaanTanis\Coderator\Commands\CoderatorCommand;

class CoderatorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('coderator')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_coderator_table')
            ->hasCommand(CoderatorCommand::class);
    }

    public function packageRegistered()
    {
        $this->app->bind('coderator', function($app) {
            return new Coderator();
        });
    }
}
