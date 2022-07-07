@extends('layouts.account')
@section('title', 'Apply Coupon')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('account.subscriptions.coupon') }}" method="post">
                @csrf

                <div class="mb-5">
                    <x-label for="coupon">{{ __('Coupon') }}</x-label>
                    <x-input id="coupon" name="coupon" type="text" :value="old('coupon')" autofocus
                             placeholder="{{ __('Coupon') }}"/>
                    @if($errors->first('coupon'))
                        <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('coupon') }}</p>
                    @endif
                </div>

                <x-button type="submit" id="card-button">
                    {{ __('Apply coupon') }}
                </x-button>


            </form>
        </div>
    </div>
@endsection
