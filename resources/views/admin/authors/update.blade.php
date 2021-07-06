@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Modifica l'autore {{$autore->nome}}</h1>
@stop
@section('content')
    <form method="post" class="mt-5" action="{{route('authors.update', $autore->id)}}">
        @method('PUT')
        @csrf
        <div class="col-md-4 float-left">
            <div class="form-group">
                <input type="text" name="nome" class="form-control" value="{{$autore->nome}}" >
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group">
                <input type="text" name="cognome" class="form-control" value="{{$autore->cognome}}">
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group">
                <input type="text" name="sito_web" class="form-control" value="{{$autore->sito_web}}">
            </div>
        </div>    
        <div class="col-md-12 float-left">
            <input type="submit" value="Modifica l'autore" class="btn btn-primary">
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>  $(function () {
            $(".dataTable").DataTable();
        }); </script>
@stop
