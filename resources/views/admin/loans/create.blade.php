@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop
@section('content')
    <div class="mt-5">
        <h1>Gestione Prestiti</h1>
        <form action="{{route('aloans.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="book_id" class="form-control">
                    @foreach($books as $book)
                        <option value="{{$book->id}}" @if($book->copie == 0) disabled @endif>{{$book->titolo}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="date" name="day" class="form-control" />
            </div>
            <input type="submit" value="Inserisci" class="btn btn-primary">
        </form>

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
