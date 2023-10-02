<?php

use App\Http\Controllers\ComicController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// 1) Il nome della rotta deve essere il nome dell'entità sulla quale stiamo lavorando
// 2) Va inserito tral parentesi quadre il NomeController::class e la funzione index()
// 3) Infine, il nome effettivo della rotta dove verranno visualizzati i dati.

Route::get("/comics", [ComicController::class, "index"])->name("comics.index");
 