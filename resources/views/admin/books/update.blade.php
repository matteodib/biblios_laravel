@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Modifica il libro</h1>
@stop
@section('content')
    <form method="post" action="{{route('abooks.update', $book->id)}}">
        @method('PUT')
        @csrf
        <div class="row">

                @if($errors->has('titolo'))
                    <div class="col-12">
                        {{$errors->first('titolo')}}
                    </div>
                @endif


            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="titolo" class="form-control" placeholder="Titolo" value="{{$book->titolo}}" />
                </div>
                <div class="form-group">
                    <input type="number" name="anno_pubb" class="form-control" placeholder="Anno di pubblicazione" value="{{$book->anno_pubb}}" />
                </div>
                <div class="form-group">
                    <input type="number" name="isbn" class="form-control" placeholder="Isbn" value="{{$book->isbn}}" />
                </div>
                <div class="form-group">
                    <input type="number" name="copie" class="form-control" placeholder="Copie" value="{{$book->copie}}" />
                </div>
                <div class="form-group">
                    <select name="argomento" class="form-control">
                        <option value="0">Seleziona un argomento</option>
                        @foreach($arg as $argomento)
                            <option @if($argomento->id == $book->argomento_id) selected @endif value="{{$argomento->id}}">{{$argomento->argomento}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group overflow-auto shadow p-3 mb-5 bg-white rounded" style="height: 100px">
                    @foreach($autori as $autore)
                        <input name="autori[]" id="{{$autore->id}}" type="checkbox" value="{{$autore->id}}" @foreach($book->autori as $aut) @if($aut->id == $autore->id) checked @endif @endforeach>
                        <label for="{{$autore->id}}">{{$autore->nome}}</label><br>
                    @endforeach

                </div>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btn-primary btnContact" value="Inserisci" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="trama" class="form-control" placeholder="Trama" style="width: 100%; height: 150px;">{{$book->trama}}</textarea>
                </div>
                <div class="form-group mb-1">
                    <label for="copertina" id="labelcop" class="btn btn-primary btnContact w-100"><i class="fas fa-book"></i> Inserisci una copertina</label>
                    <input id="copertina" type="file" name="copertina" style="display: none" value="{{$book->copertina}}"/>
                </div>
                <div class="form-group">
                    <select name="editore" class="form-control">
                        <option value="0">Seleziona un Editore</option>
                        @foreach($editori as $editore)
                            <option value="{{$editore->id}}" @if($editore->id == $book->editore_id) selected @endif>{{$editore->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
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
