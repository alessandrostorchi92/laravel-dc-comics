<?php

//TODO Il nome del controller deve essere al singolare, in PascalCase e seguito dalla parola Controller.

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Devo collegare il Model al relativo Controller
use App\Models\Comic;


class ComicController extends Controller {

    // Index() è la funzione per mostrare i dati nel seeder

    public function index() {

        $Comicslist = Comic::all();

        return view ("comics .index", ["C omics"=>$Comicslist]);

    }
    
}
