<?php

namespace App\Http\Controllers;

use App\Models\Prestito;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Book;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = new Book;
        $books = $book->all();
        $prestiti = Prestito::all();
        $users = User::all();
        return view('admin.index', compact('books', 'prestiti', 'users'));
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
        //
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
        //
    }

    public function rest(Request $request, $id) {

        $prest = Prestito::find($id);
        $prest->utente_id = $prest->utente_id;
        $prest->libro_id = $prest->libro_id;
        $prest->prestato_il = $prest->prestato_il;
        $prest->restituito = Carbon::now();

        $prest->save();
        return redirect('/loans');
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
