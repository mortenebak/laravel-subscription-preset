<?php

namespace Netbums\LaravelSubscriptionPreset\Commands;

use Illuminate\Console\Command;

class LaravelSubscriptionPresetCommand extends Command
{
    public $signature = 'laravel-subscription-preset';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
