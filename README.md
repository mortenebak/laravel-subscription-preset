# Laravel Subscription Preset
<p>
<a href="https://packagist.org/packages/netbums/laravel-subscription-preset"><img src="https://img.shields.io/badge/-Work--in--progress-yellow" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/netbums/laravel-subscription-preset"><img src="https://img.shields.io/packagist/dt/netbums/laravel-subscription-preset" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/netbums/laravel-subscription-preset"><img src="https://img.shields.io/packagist/v/netbums/laravel-subscription-preset" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/netbums/laravel-subscription-preset"><img src="https://img.shields.io/packagist/php-v/netbums/laravel-subscription-preset" alt="Latest Stable Version"></a>
</p> 

## About

This is a Laravel Preset Package that will quickly get your app up and running with subscriptions via Stripe and Laravel
Cashier.

It comes with an opinionated set of dependencies/requirements, such as Laravel Livewire, Laravel Cashier, PestPHP. It
will also set up Vite to have auto-reload when changes occur to .blade.php files.

**If this package helps you in any way, consider ☕ [buying me a cup of coffee](https://github.com/sponsors/mortenebak)**

> ### Caution
> This package is intended to be used on a **FRESH** install of Laravel.
> Do **NOT** use on an existing Laravel, as it will override some files.

## Installation

You can install the package via composer:

```bash
composer require netbums/laravel-subscription-preset
```

After installing, you can run the installer by running:

### Copying the files

```bash
php artisan laravel-subscription-preset
```

This will copy all stubs from the preset into your Laravel project.

### Install npm packages

```
npm install
```

Then run either `npm run dev` to start the Vite server or `npm run build` compile production ready assets.

### Configure .env file

Next you should copy the following into your `.env` file, and set the Stripe variables with your own data:

```
CASHIER_MODEL=App\Models\User
STRIPE_KEY=pk_test_XXXXXXXXXXXXXX
STRIPE_SECRET=sk_test_XXXXXXXXXXXXXXXXXX
STRIPE_WEBHOOK_SECRET=whsec_XXXXXXXXXXXXXXXXXXXXX
CASHIER_PAYMENT_NOTIFICATION=Laravel\Cashier\Notifications\ConfirmPayment
```

Get the values for the Stripe keys in your [Stripe Dashboard](https://dashboard.stripe.com/)

### Configure Plan seeder

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

## Usage

### Using middleware

`subscribed` and `not.subscribed`.

### Blade directives

```php
@if(auth()->user()->subscribed())
```

### @can directive

Two policies exist. You can add your own custom in `\App\Policies\SubscriptionPolicy.php`

```php
@can('cancel', auth()->user()->subscription())
@can('resume', auth()->user()->subscription())
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
