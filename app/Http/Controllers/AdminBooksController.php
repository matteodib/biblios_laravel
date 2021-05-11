<?php

namespace App\Http\Controllers;

use App\Models\Argument;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Models\Book;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $arg = Argument::all();
        $autori = Author::all();
        $editori = Publisher::all();
        return view('admin.books.update', compact('arg', 'autori', 'editori', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titolo' => 'required|string',
            'anno_pubb' => 'required|numeric|max:4',
            'isbn' => 'required|numeric',
            'trama' => 'required|string|max:500',
            'copertina' => 'required|string',
            'copie' => 'required|numeric',
            'argomento' => 'required|min:1',
            'editore' => 'required|min:1',
            'autori' => 'required'
        ]);
        $book = Book::find($id);
        $book->titolo = $request->titolo;
        $book->anno_pubb = $request->anno_pubb;
        $book->isbn = $request->isbn;
        $book->trama = $request->trama;
        $book->copertina = $request->copertina;
        $book->copie = $request->copie;
        $book->argomento_id = $request->argomento;
        $book->editore_id = $request->editore;
        $book->autori()->detach();
        foreach ($request->autori as $autore_id) {
            $book->autori()->attach($autore_id);
        }

        $book->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
