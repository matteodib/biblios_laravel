<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Prestito;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminLoansController extends Controller
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
        return view('admin.loans.index', compact( 'prestiti', 'users', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prestiti = Prestito::all();
        $books = Book::with('prestiti')->get();
        $users = User::with('libro')->get();
        return view('admin.loans.create', compact('books', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libro = Book::find($request->book_id);
        $libro->copie = $libro->copie -1;
        $libro->prestiti()->attach($request->user_id, ['prestato_il' => $request->day]);
        $libro->save();
        return redirect('/admin/loans');
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

    public function restituisci($id) {
        $prestito = Prestito::find($id);
        $libro = Book::find($prestito->book_id);
        $prestito->restituito = date('Y-m-d');
        $libro->copie = $libro->copie +1;
        $libro->save();
        $prestito->save();
        return redirect('admin/loans');
    }
}
