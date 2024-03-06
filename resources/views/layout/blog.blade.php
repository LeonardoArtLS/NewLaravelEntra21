<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss',
    'resources/js/app.js'])
    {{-- @yield exibe o conteudo de uma determinada sessão --}}
    <title>@yield("title")</title>
</head>
<body>
    <header>
        @include("layout.nav")
    </header>
    <main>
        <div class="container">
            @yield("content")
        </div>
    </main>
    @include("layout.footer")
</body>
</html>