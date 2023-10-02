<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Crea un nuovo progetto Laravel per gestire un archivio di fumetti.">

    <title>Prime operazioni CRUD</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>

    <main>

        {{-- segnaposto che verrà sostituito con il contenuto di ogni pagina --}}
        @yield('comics')

    </main>

</body>

</html>
