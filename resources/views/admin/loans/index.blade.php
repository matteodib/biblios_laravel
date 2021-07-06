@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Esegui un prestito</h1>
    <br>
    <a href="{{route('aloans.create')}}" class="btn btn-primary">Esegui un prestito</a>
@stop
@section('content')
    <div class="mt-5">
        <h1>Gestione Prestiti</h1>
        <table class="table table-striped dataTable">
            <thead>
            <tr>
                <th>Libro</th>
                <th>Utente</th>
                <th>Data inizio</th>
                <th>Restituzione</th>
            </tr>
            </thead>
            <tbody>
            @foreach($prestiti as $prestito)
                <tr>
                    <td>@foreach($books as $book) @if($prestito->book_id == $book->id ) {{$book->titolo}} @endif @endforeach</td>
                    <td>@foreach($users as $user) @if($prestito->user_id == $user->id) {{$user->name}} @endif @endforeach</td>
                    <td>{{$prestito->prestato_il}}</td>
                    <td>@if($prestito->restituito != null) Restituito il -> {{$prestito->restituito}} @else <a href="/{{$prestito->id}}/restituisci" class="btn btn-primary">Restituisci</a>@endif</td>
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
