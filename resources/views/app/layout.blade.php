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
                'csrfToken' => csrf_token(),
                'apiToken'  => $currentUser->api_token
            ]) !!};
        </script>
    </head>
    {{-- bg-indigo-grey1 --}}
    <body class="h-screen">
        <div id="app">
            <mrkd-app 
                :init-user="{{ $currentUser }}"
                :init-folders-flat="{{ $foldersFlat }}"
                :init-folders-tree="{{ $foldersTree }}"/>
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
