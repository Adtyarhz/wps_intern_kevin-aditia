<nav x-data="{ open: false }" class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-white text-lg font-bold">
                        {{ config('app.name', 'Sistem Log Harian') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-gray-900 text-white' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('logs') }}"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('logs') ? 'bg-gray-900 text-white' : '' }}">
                        Log Harian
                    </a>
                    @if (auth()->user()->hasRole(['direktur', 'manager_operasional', 'manager_keuangan']))
                        <a href="{{ route('verify-logs') }}"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('verify-logs') ? 'bg-gray-900 text-white' : '' }}">
                            Verifikasi Log
                        </a>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-300 hover:text-white">
                                {{ Auth::user()->name }}
                                <svg class="ms-2 -me-0.5 size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.show')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-gray-800' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('logs') }}"
               class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 {{ request()->routeIs('logs') ? 'bg-gray-100 text-gray-800' : '' }}">
                Log Harian
            </a>
            @if (auth()->user()->hasRole(['direktur', 'manager_operasional', 'manager_keuangan']))
                <a href="{{ route('verify-logs') }}"
                   class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 {{ request()->routeIs('verify-logs') ? 'bg-gray-100 text-gray-800' : '' }}">
                    Verifikasi Log
                </a>
            @endif
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>