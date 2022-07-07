@extends('layouts.account')
@section('title', 'Update card details')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <x-card-form :action="route('account.subscriptions.card')">
                <x-button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}">
                    {{ __('Update card') }}
                </x-button>
            </x-card-form>
        </div>

    </div>
@endsection
