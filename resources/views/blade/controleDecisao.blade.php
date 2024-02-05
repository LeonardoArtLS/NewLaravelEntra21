<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- os controles de decisão são diretivas. Todas as diretivas começam com @ --}}
    
    {{-- IF --}}
    @if(10 > 5)
        <p>10 é maior que 5</p>
    @endif

    {{-- IF COM ELSE --}}
    @if(10 > 10)
    <p>Verdadeiro</p>
    @else
    <p>Falso</p>
    @endif

    {{-- USANDO IF ELSE IF E ELSE --}}
    @if($n < 10)
    <p>{{$n}} é menor que 10</p>
    @elseif($n >= 10 && $n < 100)
    <p>{{$n}} é igual ou maior que 10 e menor que 100</p>
    @else
    <p>{{$n}} é maior ou igual a 100</p>
    @endif


    {{-- UNLESS EXECUTA O CODIGO APENAS SE A CONDIÇÂO FOR FALSA --}}
    @unless(1 > 1)
    <p>Essa condição com unless é falsa</p>
    @endunless

    {{-- ISSET - VERIFICA SE A VARIAVEL FOI SETADA --}}
    @isset($idade)
    <p>Idade: {{$idade}}</p>
    @endisset

    {{-- EMPTY - VERIFICA SE VARIAVEL ESTÁ VAZIA (uma variavel com 0 é vazia)--}}
    @empty($n)
    <p>Variavel está vazia</p>
    @endempty

    {{-- DIRETIVAS DE AUTENTICAÇÂO @AUTH @GUEST --}}
    @auth() {{-- @auth ou @auth('sessao')--}}
    <p>Usuario Logado</p>
    @endauth

    @guest('sessao'){{-- pode tanto ser @guest como @guest('sessao') --}}
    
    @endguest

</body>
</html>