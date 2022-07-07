<?php

namespace App\Models;

use App\Presenters\CustomerPresenter;
use App\Presenters\InvoicePresenter;
use App\Presenters\SubscriptionPresenter;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Billable;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'stripe_id',
        'pm_type',
        'pm_last_four',
        'trial_ends_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean'
    ];

    public function plan(): HasOneThrough
    {
        return $this->hasOneThrough(
            Plan::class, Subscription::class,
            'user_id',
            'stripe_id',
            'id',
            'stripe_price'
        );
    }

    public function presentSubscription(): ?SubscriptionPresenter
    {
        if (!$subscription = $this->subscription()) {
            return null;
        }

        return new SubscriptionPresenter($subscription->asStripeSubscription());

    }

    public function presentUpcomingInvoice(): ?InvoicePresenter
    {
        if (!$upcomingInvoice = $this->upcomingInvoice()) {
            return null;
        }

        return new InvoicePresenter($upcomingInvoice->asStripeInvoice());

    }

    public function presentCustomer(): ?CustomerPresenter
    {

        if (!$this->hasStripeId()) {
            return null;
        }

        return new CustomerPresenter($this->asStripeCustomer());
    }
}
