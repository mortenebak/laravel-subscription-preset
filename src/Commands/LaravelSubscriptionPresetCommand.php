<?php

namespace Netbums\LaravelSubscriptionPreset\Commands;

use Illuminate\Console\Command;
use Netbums\LaravelSubscriptionPreset\LaravelSubscriptionPreset;
use Symfony\Component\Console\Helper\SymfonyQuestionHelper;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class LaravelSubscriptionPresetCommand extends Command
{
    public $signature = 'laravel-subscription-preset';

    public $description = 'Install the presets for subscriptions using stripe/cashier';

    private const FUNDING_MESSAGES = [
        '',
        '  - Star or contribute to Laravel Subscription Preset:',
        '    <options=bold>https://github.com/mortenebak/laravel-subscription-preset</>',
        '  - Sponsor the creator:',
        '    <options=bold>https://www.paypal.com/paypalme/netbums</>',
//        '    <options=bold>https://github.com/sponsors/mortenebak</>',
    ];


    public function handle(): int
    {
        LaravelSubscriptionPreset::install();

        $this->info('✔ All files copied');

        $this->warn('Please run composer update');

        $wantsToSupport = (new SymfonyQuestionHelper())->ask(
            new ArrayInput([]),
            $this->output,
            new ConfirmationQuestion(
                'Can you quickly <options=bold>star our GitHub repository</>? 🙏🏻',
                true,
            )
        );

        if ($wantsToSupport === true) {
            if (PHP_OS_FAMILY == 'Darwin') {
                exec('open https://github.com/mortenebak/laravel-subscription-preset');
            }
            if (PHP_OS_FAMILY == 'Windows') {
                exec('start https://github.com/mortenebak/laravel-subscription-preset');
            }
            if (PHP_OS_FAMILY == 'Linux') {
                exec('xdg-open https://github.com/mortenebak/laravel-subscription-preset');
            }
        }

        foreach (self::FUNDING_MESSAGES as $message) {
            $this->output->writeln($message);
        }

        return self::SUCCESS;
    }
}
