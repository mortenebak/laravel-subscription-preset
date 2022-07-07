@extends('layouts.account')
@section('title', 'Available Subscriptions Plans')
@section('content')

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <h2 class="text-xl font-bold">{{ __('Select a plan to continue') }}</h2>
        @forelse($plans as $plan)
            <div>
                <a href="{{ route('subscriptions', ['plan' => $plan->slug]) }}">{{ $plan->title }}</a>
            </div>
        @empty

        @endforelse
    </div>
</div>
@endsection
