<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Panier;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view("backend.books" , compact("books"));
    }

    public function store(Request $request){
        request()->validate([
            "title" => ["required"],
            "auteur" => ["required"],
            "resume" => ["required"],
            "img" => ["required"],
            "price" => ["required" , "integer"],
            "stock" => ["required" , "integer"],
        ]);

        $data = [
            "title" => $request->title,
            "auteur" => $request->auteur,
            "resume" => $request->resume,
            "img" => $request->img,
            "price" => $request->price,
            "stock" => $request->stock,
        ];

        Book::create($data);
        return redirect()->back();
    }

    public function update(Request $request , Book $book){
        request()->validate([
            "title" => ["required"],
            "auteur" => ["required"],
            "resume" => ["required"],
            "img" => ["required"],
            "price" => ["required" , "integer"],
            "stock" => ["required" , "integer"],
        ]);

        $data = [
            "title" => $request->title,
            "auteur" => $request->auteur,
            "resume" => $request->resume,
            "img" => $request->img,
            "price" => $request->price,
            "stock" => $request->stock,
        ];

        $book->update($data);
        return redirect()->back();
    }

    public function destroy(Book $book){
        $exist = Panier::where("title" , $book->title)->first();
        if ($exist) {
            $exist->delete();
        }
        $book->delete();

        return redirect()->back();
    }

    public function showFrontEnd(Book $book){
        $exist = Panier::where("title" , $book->title)->first();
        return view("frontend.show-book" , compact("book" , "exist"));
    }
}
