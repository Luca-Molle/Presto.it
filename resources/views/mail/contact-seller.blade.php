<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources\js\app.js'])
</head>
<body>
    <p><span style="font-weight: bold;">{{ $data['name'] }}</span> chiede informazioni sul tuo annuncio: <span 
        style="color: #F58B00; font-weight:bold">
        {{ $data['title'] }}</span></p>
        <p>Messaggio: </p>
        <p>{{ $data['message'] }}</p>
        <a href="{{ $data['email'] }}"
            style="text-decoration: none; color:#F58B00">
                Rispondi a {{ $data['name'] }}
        </a>
</body>
</html>