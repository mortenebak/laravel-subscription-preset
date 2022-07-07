<?php

namespace Netbums\LaravelSubscriptionPreset\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Netbums\LaravelSubscriptionPreset\LaravelSubscriptionPresetServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Netbums\\LaravelSubscriptionPreset\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelSubscriptionPresetServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-subscription-preset_table.php.stub';
        $migration->up();
        */
    }
}
