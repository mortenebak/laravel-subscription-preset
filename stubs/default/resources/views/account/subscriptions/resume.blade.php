@extends('layouts.account')
@section('title', 'Resume Subscription')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('account.subscriptions.resume') }}" method="post">
                @csrf
                <x-button type="submit">
                    {{ __('Resume subscription') }}
                </x-button>
            </form>
        </div>
    </div>
@endsection
