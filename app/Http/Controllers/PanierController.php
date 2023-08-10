<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Panier;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;
use PhpParser\Node\Expr\Cast\Bool_;

class PanierController extends Controller
{
    public function index(){
        $paniers = Panier::all();
        $books = Book::all();
        return view("frontend.paniers" , compact("paniers" , "books"));
    }
    public function addFromBook(Book $book){
        $exist = Panier::where("title" , $book->title)->first();

        if ($book->stock > 0) {
            if ($exist) {
                $exist->number += 1 ;
                $exist->save();
            } else {
                $data = [
                    "title" => $book->title ,
                    "number" => 1 ,
                ];
                Panier::create($data);
            }
            $book->stock -= 1 ;
            $book->save();
        }
        return redirect()->back();
    }

    public function removeFromBook(Book $book){
        $exist = Panier::where("title" , $book->title)->first();

        if ($exist) {
            $exist->number -= 1 ;
            if ($exist->number === 0) {
                $exist->delete();
            } else {
                $exist->save();
            }            
            $book->stock += 1;
            $book->save();
        }

        return redirect()->back();
    }

    public function addFromPanier(Panier $panier){
        $exist = Book::where("title" , $panier->title)->first();

        if ($exist->stock > 0) {
            $panier->number += 1;
            $panier->save();

            $exist->stock -= 1;
            $exist->save();
        }

        return redirect()->back();
    }

    public function removeFromPanier(Panier $panier){
        $exist = Book::where("title" , $panier->title)->first();

        if ($panier->number > 0) {
            $panier->number -= 1 ;
            if ($panier->number === 0) {
                $panier->delete();
            } else {
                $panier->save();
            }
            $exist->stock += 1;
            $exist->save();
        }
        return redirect()->back();
    }
}
