@extends("layout.blog")
@section("title", "Artigos")
@section("content")
<h1>Aula de programação</h1>
<table class="table">
<thead>
    <tr>
        <th>TÍTULO</th>
        <th>PREVIEW</th>
        <th>TEXTO</th>
        <th>AUTOR</th>
        <th>AÇÕES</th>
    </tr>
</thead>
<tbody>
    @foreach ($articles as $a)
    <tr>
        <td>{{$a->title}}</td>
        <td>{{$a->preview}}</td>
        <td>{{$a->text}}</td>
        <td>{{$a->author}}</td>
        <td></td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection

