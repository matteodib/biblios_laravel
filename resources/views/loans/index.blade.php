@extends('layouts.template')

@section('content')

<div>
    <section>
        <!--for demo wrap-->
        <h1>LIBRI SALVATI</h1>
        <div class="text-center mb-5 mt-5">
            <a href="{{route('loans.create')}}" class="btn-primary btn">Prendi in prestito un libro</a>
        </div>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th>Titolo</th>

                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                @foreach($prestiti as $loan)

                    <tr>
                        <td>{{$loan->id}}</td>
                        <td>@foreach($books as $book) @if($loan->libro_id == $book->id) {{$book->titolo}} @endif @endforeach</td>
                        <td>@foreach($users as $user) @if($loan->utente_id == $user->id) {{$user->name}} @endif @endforeach</td>
                        <td>{{$loan->prestato_il}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
