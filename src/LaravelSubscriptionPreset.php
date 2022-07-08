<?php

namespace Netbums\LaravelSubscriptionPreset;

use Illuminate\Filesystem\Filesystem;

class LaravelSubscriptionPreset
{
    public static function install()
    {
        $filesystem = new Filesystem();
        $filesystem->copyDirectory(__DIR__ . '/../stubs/default', base_path());

        // Todo: Auto insert env vars instead of copying over the .env.example and asking users to insert vars manually

    }
}
