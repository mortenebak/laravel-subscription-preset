@extends('layouts.account')
@section('title', 'Your settings')


@section('content')
    @if(session('success'))
    <div class="text-indigo-600 text-xs mb-10">
            {{ session('success') }}
    </div>
    @endif

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-10">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('settings.update', $user) }}" method="POST">
                @csrf
                <div class="flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <x-label for="name">{{ __('Name') }}</x-label>
                            <x-input id="name" name="name" type="text"
                                     value="{{ $user->name }}" autofocus
                                     placeholder="{{ __('Your name') }}"></x-input>
                            @if($errors->first('name'))
                                <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="mb-5">
                            <x-label for="email">{{ __('Email') }}</x-label>
                            <x-input id="email" name="email" type="text"
                                     value="{{ $user->email }}"
                                     placeholder="{{ __('E-mail') }}"></x-input>
                            @if($errors->first('email'))
                                <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="mb-2">
                            <x-button>Save Settings</x-button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('password.update', $user) }}" method="POST">
                @csrf
                <div class="flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <x-label for="current_password">{{ __('Current Password') }}</x-label>
                            <x-input id="current_password" name="current_password" type="password"></x-input>
                            @if($errors->first('current_password'))
                                <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('current_password') }}</p>
                            @endif
                        </div>
                        <div class="mb-5">
                            <x-label for="new_password">{{ __('New Password') }}</x-label>
                            <x-input id="new_password" name="new_password" type="password"></x-input>
                            @if($errors->first('new_password'))
                                <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('new_password') }}</p>
                            @endif
                        </div>
                        <div class="mb-5">
                            <x-label for="confirm_password">{{ __('Confirm Password') }}</x-label>
                            <x-input id="confirm_password" name="confirm_password" type="password"></x-input>
                            @if($errors->first('confirm_password'))
                                <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('confirm_password') }}</p>
                            @endif
                        </div>
                        <div class="mb-2">
                            <x-button>Change Password</x-button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
