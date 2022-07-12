<section id="dashboard-nav" class="bg-white border-b border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-6">
        <nav class="flex justify-between h-14 items-center">
            <div class="flex h-full items-center space-x-4 ">
                <a href="{{ route('dashboard') }}"
                   class="border-b-2 @if(request()->routeIs('dashboard')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Overview') }}
                </a>
            </div>
            <div class="flex h-full items-center space-x-4 ">

                <a href="{{ route('account') }}"
                   class="border-b-2 @if(request()->routeIs('account')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('My Account') }}
                </a>
                <a href="{{ route('settings.edit') }}"
                   class="border-b-2 @if(request()->routeIs('settings.edit')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Settings') }}
                </a>
                <a href="{{ route('account.subscriptions') }}"
                   class="border-b-2 @if(request()->routeIs('account.subscriptions.*') OR request()->routeIs('account.subscriptions')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Subscription') }}
                </a>
            </div>
        </nav>
    </div>
</section>
