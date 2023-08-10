<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
use Illuminate\Support\Facades\Route;

// *----------------* //
Route::get('/' , [HomeController::class , "index"])->name("home.index");

//^ VIEWS FOR BOOKS
Route::get('/books' , [BookController::class , "index"])->name("books.index");
Route::get('/books/{book}/show/frontend' , [BookController::class, "showFrontEnd"])->name("books.showFrontEnd");

//^ VIEWS FOR PANIERS
Route::get('/paniers' , [PanierController::class , "index"])->name("paniers.index");

//* FONCTION BOOKS
Route::post('/books/store' , [BookController::class , "store"])->name("books.store");
Route::put('/books/{book}/update' , [BookController::class , "update"])->name("books.update");
Route::delete('/books/{book}/destroy' , [BookController::class , "destroy"])->name("books.destroy");

//* FONCTION PANIERS 
Route::put('/paniers/{book}/add/from/book' , [PanierController::class , "addFromBook"])->name("paniers.addFromBook");
Route::put('/paniers/{book}/remove/from/book' , [PanierController::class , "removeFromBook"])->name("paniers.removeFromBook");
Route::put('/paniers/{panier}/add/from/panier' , [PanierController::class , "addFromPanier"])->name("paniers.addFromPanier");
Route::put('/paniers/{panier}/remove/from/panier' , [PanierController::class , "removeFromPanier"])->name("paniers.removeFromPanier");
