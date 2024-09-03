<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    <header>
        <!-- Your header content here -->
        {{ $header ?? '' }}
    </header>
    <main>
        {{ $slot }}
    </main>
    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
