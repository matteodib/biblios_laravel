@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gestisci gli autori</h1>
    <a href="/admin/authors/create" class="btn btn-primary mt-4">Aggiungi un Autore</a>
@stop
@section('content')
    <div class="mt-5">
        <h1>Gestione Prestiti</h1>
        <table class="table table-striped dataTable">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Sito web</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
            </thead>
            <tbody>
            @foreach($autori as $autore)
                <tr>
                    <td>{{$autore->nome}}</td>
                    <td>{{$autore->cognome}}</td>
                    <td><a href="https://{{$autore->sito_web}}">{{$autore->sito_web}}</a></td>
                    <td><a href="/admin/authors/{{$autore->id}}/edit" class="btn btn-primary">Modifica</a></td>
                    <td><form method="post" action="{{ route('authors.destroy', $autore->id) }}"> @method('DELETE') @csrf
                        <input type="submit" value="Elimina" class="btn btn-danger">
                    </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>  $(function () {
            $(".dataTable").DataTable();
        }); </script>
@stop
