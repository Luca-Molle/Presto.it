<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo.png">
    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- Smooth Scroll : https://preview.keenthemes.com/html/metronic/docs/general/smooth-scroll --}}
    {{-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <script src="assets/plugins/global/plugins.bundle.js"></script> --}}
    {{-- Font-awesome --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'
        integrity='sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=='
        crossorigin='anonymous' />
    <!-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js%22%3E"></script> -->
    @vite(['resources/css/app.css', 'resources\js\app.js'])
    @livewireStyles
    <title>Presto.it</title>
</head>

<body>
    @if (Route::is('register') || Route::is('login'))
        <div class="d-none" data-aos="fade-up">
            <x-nav />
        </div>
    @else
        <x-nav />
    @endif
    <div class="box2 min-vh-100" data-aos="fade-up">
        {{ $slot }}
    </div>

    <x-footer data-aos="fade-up" />
    @livewireScripts

    @livewire('livewire-ui-modal')
</body>

</html>
