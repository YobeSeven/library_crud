<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $last_three_books = Book::orderByDesc('id')->take(3)->get();
        $books = Book::all();
        return view("home" , compact("last_three_books" , "books"));
    }
}
