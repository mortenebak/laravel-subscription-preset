# Laravel Subscription Preset

- **NOT YET READY FOR PRODUCTION**

This is a Laravel Preset Package that will quickly get your app up and running with subscriptions via Stripe and Laravel Cashier.

## Caution
This package is intended to be used on a **FRESH** install of Laravel.
Do **NOT** use on an existing Laravel, as it will override some files.

## Installation

You can install the package via composer:

```bash
composer require netbums/laravel-subscription-preset
composer update
```
After installing, you can run the installer by running:

### 1. Copying the files
```bash
php artisan laravel-subscription-preset
```
This will copy all stubs from the packing into your Laravel project.

### 2. configure .env file
Next you should copy the following into your `.env` file, and set the Stripe variables with your own data:

```
CASHIER_MODEL=App\Models\User
STRIPE_KEY=pk_test_XXXXXXXXXXXXXX
STRIPE_SECRET=sk_test_XXXXXXXXXXXXXXXXXX
STRIPE_WEBHOOK_SECRET=whsec_XXXXXXXXXXXXXXXXXXXXX
CASHIER_PAYMENT_NOTIFICATION=Laravel\Cashier\Notifications\ConfirmPayment
```

### 3. configure Plan seeder
Inside  `database\seeders\DatabaseSeeder.php` you should set up your Plans.
```php
use App\Models\Plan;

Plan::query()->create([
    'title' => 'Pro - $99 / month',
    'slug' => 'monthly',
    'stripe_id' => 'price_XXXXXXXXXXXXX'
]);
Plan::query()->create([
    'title' => 'Pro - $999 / year',
    'slug' => 'yearly',
    'stripe_id' => 'price_XXXXXXXXXXXXX'
]);
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/mortenebak/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Morten Bak](https://github.com/mortenebak)
- [All Contributors](../../contributors)
  
The [Tall Stack](https://github.com/laravel-frontend-presets/tall) included in this preset is created by:
- [Dan Harrin](https://github.com/DanHarrin)
- [Liam Hammett](https://github.com/imliam)
- [Ryan Chandler](https://github.com/ryangjchandler)
- [Tailwind UI](https://tailwindui.com) for the default authentication and pagination views


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
