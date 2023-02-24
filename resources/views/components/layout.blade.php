<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources\js\app.js'])

    <title>Presto.it</title>
</head>

<body>
    @if (Route::is('register') || Route::is('login'))
        <div class="d-none">
            <x-nav />
        </div>
    @else
        <x-nav />
    @endif
    <div class="box2 min-vh-100">
        {{ $slot }}
    </div>

    <x-footer />
    @livewireScripts
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js'
      
        const swiper = new Swiper(...)
    </script>
</body>

</html>
