@extends('layouts.account')
@section('title', 'Checkout')
@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <x-card-form :action="route('subscriptions.store')">
                <input type="hidden" name="plan" value="{{ request('plan') ?? 'pro-monthly' }}">

                <div class="mb-5">
                    <x-label for="coupon">{{ __('Coupon') }}</x-label>
                    <x-input id="coupon" name="coupon" type="text" :value="old('coupon')" autofocus
                             placeholder="{{ __('Coupon') }}"/>
                    @if($errors->first('coupon'))
                        <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('coupon') }}</p>
                    @endif
                </div>

                <x-button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}">
                    {{__('Pay')}}
                </x-button>
            </x-card-form>
        </div>
    </div>
@endsection

