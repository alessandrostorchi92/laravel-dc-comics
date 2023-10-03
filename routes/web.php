<?php

use App\Http\Controllers\ComicController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('homepage');
});

// 1) Il nome della rotta deve essere il nome dell'entità sulla quale stiamo lavorando
// 2) Va inserito tral parentesi quadre il NomeController::class e la funzione index()
// 3) Infine, il nome effettivo della rotta dove verranno visualizzati i dati.


//TODO Per evitare un conflitto di rotte bisogna mettere sempre per prima le routes Create rispetto a quelle Read

//CREATE
Route::get("/comics/create", [ComicController::class, "create"])->name("comics.create");
Route::post('/comics', [ComicController::class, 'store'])->name('comics.store');

//READ
Route::get("/comics", [ComicController::class, "index"])->name("comics.index");
Route::get("/comics/{id}", [ComicController::class, "show"])->name("comics.show");

 