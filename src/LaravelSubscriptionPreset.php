<?php

namespace Netbums\LaravelSubscriptionPreset;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset;

class LaravelSubscriptionPreset extends Preset
{
    public const NPM_PACKAGES_TO_ADD = [
        '@tailwindcss/forms' => '^0.5.2',
        '@tailwindcss/typography' => '^0.5',
        'alpinejs' => '^3.8',
        'autoprefixer' => '^10.4.2',
        'resolve-url-loader' => '^3.1',
        'sass' => '^1.3',
        'sass-loader' => '^8.0',
        'tailwindcss' => '^3.0',
        'vite' => '^2.9.11',
        'vite-plugin-full-reload' => '^1.0.0',
        'laravel-vite-plugin' => '^0.3.0',
    ];

    public const NPM_PACKAGES_TO_REMOVE = [
        'lodash',
        'axios',
    ];

    public static function install(): void
    {
        static::updatePackages();

        $filesystem = new Filesystem();
        $filesystem->copyDirectory(__DIR__ . '/../stubs/default', base_path());

        // Todo: Auto insert env vars instead of copying over the .env.example and asking users to insert vars manually
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge(
            static::NPM_PACKAGES_TO_ADD,
            Arr::except($packages, static::NPM_PACKAGES_TO_REMOVE)
        );
    }
}
