<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo.png">
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
    rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources\js\app.js'])
    @livewireStyles
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
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
    ></script>
</body>

</html>
