@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
    <table class="table table-striped dataTable">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Anno di Pubblicazione</th>
                <th scope="col">Isbn</th>
                <th scope="col">Trama</th>
                <th scope="col">Copertina</th>
                <th scope="col">Copie</th>
                <th scope="col">Argomento</th>
                <th scope="col">Editore</th>
                <th scope="col">Autore</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>

        </thead>
        <tbody>
            @foreach($books as $book)
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$book->titolo}}</td>
                    <td>{{$book->anno_pubb}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->trama}}</td>
                    <td>{{$book->copertina}}</td>
                    <td>{{$book->copie}}</td>
                    <td>{{$book->argomento->argomento}}</td>
                    <td>{{$book->editore->nome}}</td>
                    <td>@foreach($book->autori as $autore)
                            {{$autore->nome}}
                        @endforeach</td>
                    <td><a href="/abooks/{{$book->id}}/edit" class="btn btn-primary">Modifica</a></td>
                    <td><form method="post" action="{{ route('books.destroy', $book->id) }}"> @method('DELETE') @csrf
                            <input type="submit" value="Elimina">
                        </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>  $(function () {
            $(".dataTable").DataTable();
        }); </script>
@stop
