@extends('layouts.account')
@section('title', 'Swap Subscription Plan')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('account.subscriptions.swap') }}" method="post">
                @csrf
                <div class="mb-5">
                    <x-label for="plan">{{ __('Plan') }}</x-label>
                    <select name="plan" id="plan"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($plans as $plan)
                            <option value="{{ $plan->slug }}">{{ $plan->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <x-button type="submit">
                        {{ __('Swap') }}
                    </x-button>
                </div>

            </form>
        </div>
    </div>
@endsection
