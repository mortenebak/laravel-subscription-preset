@extends('layouts.account')
@section('title', 'Dashboard')
@section('content')

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-xl font-bold">Welcome to your Dashboard, {{ auth()->user()->username }}!</h2>
        </div>
    </div>

@endsection
