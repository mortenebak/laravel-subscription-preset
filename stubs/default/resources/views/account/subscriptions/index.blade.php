@extends('layouts.account')
@section('title', 'Subscription')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

            @if(auth()->user()->subscribed())
                @if($subscription)
                    <ul class="list-disc pl-5">
                        <li>
                            {{auth()->user()->plan->title}}
                            ({{$subscription->amount()}}/{{$subscription->interval()}})
                        </li>
                        @if(auth()->user()->subscription()->cancelled())
                            <li>
                                Ends at {{ $subscription->cancelAt() }}
                                <a href="{{ route('account.subscriptions.resume') }}" class="underline">
                                    {{ __('Resume subscription') }}
                                </a>
                            </li>
                        @endif

                        @if($invoice)
                            <li>{{ __('Next Payment') }}{{ $invoice->amount() }} {{ __('on') }} {{ $invoice->nextPaymentAttempt() }}</li>
                        @endif

                        @if($customer)
                            <li>{{ __('Balance') }} {{ $customer->balance() }}</li>
                        @endif

                    </ul>
                @endif

                <div class="mt-5">
                    {{ __('Use the menu on the left, or') }}
                    <a href="{{ auth()->user()->billingPortalUrl(route('account.subscriptions')) }}" class="underline">
                        {{ __('go to the Billing Portal at Stripe') }}
                    </a>
                   {{ __(' to handle your subscription.') }}
                </div>
            @else
                <div>
                    <p>{{ __("You don't have a subscription.") }}</p>
                    <a href="{{ route('subscriptions.plans') }}">
                        <x-button>
                            {{ __('Go check out our available plans') }}
                        </x-button>
                    </a>
                </div>

            @endif


        </div>
    </div>
@endsection
