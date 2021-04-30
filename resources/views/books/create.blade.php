@extends('layouts.template')

@section('content')
    <!------ Include the above in your HEAD tag ---------->

    <div class="container contact-form">
        <div class="contact-image">
            <img src="{{asset('images/book-png.png')}}">
        </div>
        <form method="post" action="{{route('books.store')}}">
            <h3>Inserisci un libro</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="titolo" class="form-control" placeholder="Titolo" value="" />
                    </div>
                    <div class="form-group">
                        <input type="number" name="anno_pubb" class="form-control" placeholder="Anno di pubblicazione" value="" />
                    </div>
                    <div class="form-group">
                        <input type="number" name="isbn" class="form-control" placeholder="Isbn" value="" />
                    </div>
                    <div class="form-group">
                        <input type="number" name="isbn" class="form-control" placeholder="Copie" value="" />
                    </div>
                    <div class="form-group">
                        <select name="argomento" class="form-control">
                            <option value="0">Seleziona un argomento</option>
                            @foreach($arg as $argomento)
                                <option value="{{$argomento->id}}">{{$argomento->argomento}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="autore" class="form-control">
                            <option value="0">Seleziona un Autore</option>
                            @foreach($autori as $autore)
                                <option value="{{$autore->id}}">{{$autore->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btn-primary btnContact" value="Inserisci" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="trama" class="form-control" placeholder="Trama" style="width: 100%; height: 150px;"></textarea>
                    </div>
                    <div class="form-group mb-1">
                        <label for="copertina" id="labelcop" class="btn btn-primary btnContact w-100"><i class="fas fa-book"></i> Inserisci una copertina</label>
                        <input id="copertina" type="file" name="copertina" style="display: none"/>
                    </div>
                    <div class="form-group">
                        <select name="editore" class="form-control">
                            <option value="0">Seleziona un Editore</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
