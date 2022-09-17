<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-100 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/administration">
                        <img src="{{ asset('image/bigscreen_logo.png') }}" alt="logo BigScreen" width=200>
                    </a>
                </div>
                <div>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <x-nav-link href="{{ url('/administration') }}">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            @else
                                <a href="{{ route('login') }}" >
                                    <x-primary-button class="ml-3">
                                        {{ __('Connexion') }}
                                    </x-primary-button>
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" >
                                        <x-primary-button class="ml-3">
                                            {{ __("S'enregistrer") }}
                                        </x-primary-button>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>