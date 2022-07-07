<?php

namespace Netbums\LaravelSubscriptionPreset\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Netbums\LaravelSubscriptionPreset\LaravelSubscriptionPreset
 */
class LaravelSubscriptionPreset extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-subscription-preset';
    }
}
