@extends('layouts.account')
@section('title', 'Invoices')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            @forelse($invoices as $invoice)
                <div>
                    {{ $invoice->date()->toFormattedDateString() }}
                    {{ $invoice->total() }}
                    <a href="{{ route('account.subscriptions.invoice', $invoice->id) }}">
                        {{ __('Download') }}
                    </a>
                </div>
            @empty
                {{ __('No invoices') }}
            @endforelse
        </div>
    </div>
@endsection
