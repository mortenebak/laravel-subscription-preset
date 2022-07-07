<?php

namespace Netbums\LaravelSubscriptionPreset;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Netbums\LaravelSubscriptionPreset\Commands\LaravelSubscriptionPresetCommand;

class LaravelSubscriptionPresetServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-subscription-preset')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-subscription-preset_table')
            ->hasCommand(LaravelSubscriptionPresetCommand::class);
    }
}
