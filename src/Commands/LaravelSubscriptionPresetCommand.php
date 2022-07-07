<?php

namespace Netbums\LaravelSubscriptionPreset\Commands;

use Illuminate\Console\Command;
use Netbums\LaravelSubscriptionPreset\LaravelSubscriptionPreset;

class LaravelSubscriptionPresetCommand extends Command
{
    public $signature = 'laravel-subscription-preset';

    public $description = 'Install the presets for subscriptions using stripe/cashier';

    public function handle(): int
    {
        LaravelSubscriptionPreset::install();

        $this->comment('All done');

        return self::SUCCESS;
    }
}
