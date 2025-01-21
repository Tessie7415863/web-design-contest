<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{"MY APP"}}</title>
    <link rel="icon" type="image/x-icon" href="../../../../public//build/assets/logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 min-h-screen">
    {{ $slot }}
    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>