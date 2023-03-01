<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuova richiesta utente revisore</title>
</head>
<body>
    <h3>Un utente ha richiesto di lavorare con noi</h3>
    <h4>Ecco i suoi dati:</h4>
    <p>Nome: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Messaggio: {{ $user->message }}</p>
    <p>Se vuoi renderlo revisore clicca qui: </p>
    <a href="{{ route('make.user.revisor', compact('user')) }}">Clicca</a>
</body>
</html>