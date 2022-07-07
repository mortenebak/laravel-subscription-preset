<?php

namespace Netbums\LaravelSubscriptionPreset;

use Illuminate\Filesystem\Filesystem;

class LaravelSubscriptionPreset
{


    public static function install()
    {
        $filesystem = new Filesystem();
        $filesystem->copyDirectory(__DIR__ . '/../stubs/default', base_path());

    }
}
