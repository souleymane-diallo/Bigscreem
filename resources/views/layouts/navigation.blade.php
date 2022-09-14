<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <h1 class="text-3xl font-bold">Bigscreen</h1>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <x-primary-button class="ml-3">
                    {{ __('Connexion') }}
                </x-primary-button>
            </div>
        </div>
    </div>
</nav>
