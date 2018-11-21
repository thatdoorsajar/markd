<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script>
            window.Mrkd = {!! json_encode([
                'csrfToken' => csrf_token()
            ]) !!};
        </script>
    </head>
    <body class="flex flex-col bg-purple h-screen">
        <div id="app">
            <nav class="flex items-center justify-between py-5 px-8">
                <div class="flex items-center flex-no-shrink mr-6">
                    <a href="/" class="font-extrabold font-sans text-2xl text-grey-darkest border-b-4 hover:border-purple-light no-underline">Mrkd</a>
                </div>
                <div class="block">
                    <a href="/sign-in" class="font-semibold font-sans text-lg no-underline text-grey-darkest hover:text-white mr-4">
                        Sign In
                    </a>
                    <a href="/sign-up" class="font-semibold font-sans text-lg no-underline text-white bg-purple-light hover:bg-purple rounded-full py-2 px-4">
                        Sign Up
                    </a>
                </div>
            </nav>
            @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
