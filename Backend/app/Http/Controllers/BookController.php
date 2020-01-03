<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Book;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        if ($books){
            return response()->json($books);
        } else {
            return response()->json([
                'message' => "Incapaz de pegar livros!",
                'status' => 400
            ]);
        }
    }

    public function show($id){
        $book = Book::findOrFail($id);
        if ($book){
            return response()->json([$book]);
        } else {
            return response()->json([
                'message' => "Livro em questão não foi encontrado!",
                'status' => 400
            ]);
        }
    }

    public function store(Request $req){
        $book = new Book();
        $book->insertBook($req);
        if ($book){
            return response()->json([$book]);;
        } else {
            return response()->json([
                'message' => "Incapaz de atualizar o livro!",
                'status' => 400
            ]);
        }
    }

    public function update(Request $req, $id){
        $book = Book::findOrFail($id);
        $book->updateBook($req);
        return response()->json([$book]);
    }

    public function destroy($id){
        $book = Book::findOrFail($id);
        $book = Book::destroy($id);
        if ($book){
            return response()->json([$book]);
        } else {
            return response()->json([
                'message' => "Livro é imortal!",
                'status' => 400
            ]);
        }
    }

		public function downloadBook($id) {
			$book = Book::findOrFail($id);
			if ($book){
				return Storage::download($book->file);
			} else {
				return response()->json([
					'message' => 'Erro no download de arquivo',
					'status' => '400'
				]);
			}
		}
}
