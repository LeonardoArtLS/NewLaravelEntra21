<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laço for</title>
</head>
<body>
    {{-- USANDO LAÇO FOR --}}
    @for($i = 0; $i < count($dias); $i++)
        <p>
            {{$dias[$i]}}
        @if($i == 0 || $i == 6)
            <small>É final de semana.</small>
            @else
            <small>É dia útil.</small>
        @endif
        </p>
    @endfor
</body>
</html>