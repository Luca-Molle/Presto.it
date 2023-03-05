<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

    <x-footer data-aos="fade-up"/>
    @livewireScripts
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
</body>

</html>