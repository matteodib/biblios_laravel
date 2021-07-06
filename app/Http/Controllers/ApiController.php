<?php

namespace App\Http\Controllers;

use App\Models\Argument;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Prestito;
use Mail;
use App\Mail\NotifyUser;

class ApiController extends Controller
{
    public function angularlogin(Request $request) {
        $user= User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'code' => 404,
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        $response = [
            'code' => 201,
            'userobj' => $user
        ];

        return response($response, 201);
    }
    /*public function login(Request $request) {
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
    }*/
    public function args() {
        $args = Argument::all();
        return $args;
    }
    public function index() {
        $books = Book::all();
        $editori = Publisher::all();
        $args = Argument::all();
        foreach ($books as $book) {
            foreach ($editori as $editore) {
                if ($book['editore_id'] == $editore['id']) {
                    $book['editore_id'] = $editore['nome'];
                }
            }
            foreach ($args as $arg) {
                if ($book['argomento_id'] == $arg['id']) {
                    $book['argomento_id'] = $arg['argomento'];
                }
            }

            $array[] = $book;

        }
        return $array;
    }
    public function store(Request $request) {
        $libro = new Book();
        $libro->titolo = $request->titolo;
        $libro->anno_pubb = $request->anno_pubb;
        $libro->isbn = $request->isbn;
        $libro->trama = $request->trama;
        $libro->copertina = $request->copertina;
        $libro->copie = $request->copie;
        $libro->argomento_id = $request->argomento;
        $libro->editore_id = $request->editore;

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
        $libro->argomento_id = $request->argomento_id;
        $libro->editore_id = $request->editore_id;
        $libro->save();
        return response()->json('Libro modificato', 200);
    }
    public function show($id) {
        return Book::find($id);
    }
    public function setPrestito(Request $request) {

        $libro = Book::find($request->book_id);
        $libro->copie = $libro->copie -1;
        $libro->prestiti()->attach($request->user_id, ['prestato_il' => $request->day]);
        $libro->save();
        return response()->json('Presito aggiunto', 200);

    }
    public function getPrestiti($id) {
        $prestiti = Prestito::where('user_id', $id)->get();
        $books = Book::all();
        $users = User::all();
        foreach($prestiti as $prestito) {
           foreach($books as $book) {
                if ($prestito->book_id == $book['id']) {
                    $prestito->book_id = $book['titolo'];
                }
            }
            foreach($users as $user) {
                if ($prestito->user_id == $user['id']) {
                    $prestito->user_id = $user['name'];
                    $prestito->email = $user['email'];
                }
            } 
        }
            
        $array = $prestiti;
        return $array;

    }
    public function notifyPrestito(Request $request) {
        Mail::to($request->email)->send(new NotifyUser($request));
        return response()->json('Presito notificato', 200);

    }
}
