@extends('layouts.template')

@section('content')

    <div class="container contact-form">
        <div class="contact-image">
            <img src="{{asset('images/loan.png')}}">
        </div>
        @guest()
            <p class="text-center pb-5 pt-4">Bisogna essere loggati</p>
        @endguest
        @auth()
            {{Auth::user()->id}}
        <form method="post" action="{{route('loans.store')}}">
            @csrf
            <h3>Nuovo prestito</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Libri disponibili</label>
                        <select name="book" class="form-control">
                            @foreach($books as $book)
                                <option value="{{$book->id}}">{{$book->titolo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pil">Data di inizio prestito</label>
                        <input type="date" class="form-control" id="pil" name="pilaf">
                    </div>
                    <input type="submit" value="Inizia Prestito" class="btn btn-primary mt-4">

                </div>
                <div class="col-md-6 pt-4 pl-3">
                    <p>Da questa sezione potrai prendere in prestito un dato libro disponibile inserendo l'inizio della data del prestito.</p>
                </div>
            </div>
        </form>
        @endauth
    </div>
@endsection
