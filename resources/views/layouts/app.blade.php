<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
      @if (Route::is('administration.*'))
        @auth
          <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
            <!-- Page Content -->
          
              @include('layouts.navigation')
              @include('layouts.sidebar')
            
            <main>
                <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
                  {{ $slot }}
                </div>
            </main>
            
          </div>
        @endauth
        @else
        <div class="flex flex-col min-h-screen bg-gray-100">
          <main>
            {{ $slot }}
          </main>
        </div>
      
      @endif
        
    </body>
</html>
