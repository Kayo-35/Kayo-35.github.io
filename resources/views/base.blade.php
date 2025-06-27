<!doctype html>
<html lang="pt-br"
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Home</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
    @yield('conteudo')

    @vite(['resources/js/app.js'])
</body>
</html>
