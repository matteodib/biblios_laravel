@extends('layouts.template')

@section('content')
    <section>
        <!--for demo wrap-->
        <h1>LIBRI SALVATI</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Anno di Pubblicazione</th>
                    <th>Isbn</th>
                    <th>Trama</th>
                    <th>Copertina</th>
                    <th>Copie</th>
                    <th>Argomento</th>
                    <th>Editore</th>
                    <th>Autore</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach($books as $book)

                        <tr>
                            <td>{{$book->titolo}}</td>
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
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
