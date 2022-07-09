@extends('layouts.base')

@section('body')
    @include('components.navigation')
    @include('components.dashboard.nav')
    <div class="py-12 max-w-7xl flex container mx-auto gap-5 px-6">
        <!-- Page Content -->
        <main class="w-full">
            @yield('content')
        </main>
    </div>


    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
