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

        foreach ($Comicslist as $key => $Comic) {
            $Comicslist[$key]["shortly_description"] = $this->truncate($Comic["description"], 180);
        }

        return view ("comics.index", ["Comics"=>$Comicslist]);

    }

    public function show($id) {

        $comic = Comic::find($id);

        return view("comics.show", ["comic" => $comic]);

    }

    private function truncate($text, $chars = 25) {
        if (strlen($text) <= $chars) {
            return $text;
        }
        $text = $text . " ";
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . "...";
        return $text;
    }
    
}
