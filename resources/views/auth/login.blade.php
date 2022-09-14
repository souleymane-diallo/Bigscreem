<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bigscreen') }}
            </h2>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de passe')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Connexion') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
