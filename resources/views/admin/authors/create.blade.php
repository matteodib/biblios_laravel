@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Aggiungi un autore</h1>
@stop
@section('content')
    <form method="post" class="mt-5" action="{{route('authors.store')}}">
        @method('POST')
        @csrf
        <div class="col-md-4 float-left">
            <div class="form-group">
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group">
                <input type="text" name="cognome" class="form-control" placeholder="Cognome">
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group">
                <input type="text" name="sito_web" class="form-control" placeholder="Sito Web">
            </div>
        </div>    
        <div class="col-md-12 float-left">
            <input type="submit" value="Aggiungi l'autore" class="btn btn-primary">
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
