<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Parentesco</th>
            </tr>
        </thead>
        <tbody>
            @foreach($familia as $f)
            <tr>
                <td>{{$f["nome"]}} {{$loop->even}}</td>
                <td>{{$f["idade"]}}</td>
                <td>{{$f["parentesco"]}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>