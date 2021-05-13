<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request) {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    public function index() {
        return Book::all();
    }
    public function store(Request $request) {
        $libro = new Book();
        $libro->titolo = $request->titolo;
        $libro->anno_pubb = $request->anno_pubb;
        $libro->isbn = $request->isbn;
        $libro->trama = $request->trama;
        $libro->copertina = $request->copertina;
        $libro->copie = $request->copie;
        $libro->argomento_id = $libro->argomento()->argomento;
        $libro->editore_id = $libro->editore()->nome;

        $libro->save();
        return response()->json('Libro Inserito', 201);
    }
    public function destroy($id) {
        $book = Book::find($id);
        $book->delete();
        return response()->json('Libro eliminato', 200);
    }
    public function put(Request $request, $id) {
        $libro = Book::find($id);
        $libro->titolo = $request->titolo;
        $libro->anno_pubb = $request->anno_pubb;
        $libro->isbn = $request->isbn;
        $libro->trama = $request->trama;
        $libro->copertina = $request->copertina;
        $libro->copie = $request->copie;
        $libro->argomento_id = '1';
        $libro->editore_id = '1';
        $libro->save();
        return response()->json('Libro modificato', 200);
    }
    public function show($id) {
        return Book::find($id);
    }
}
