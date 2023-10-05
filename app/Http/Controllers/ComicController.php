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

        $selectedComic = Comic::find($id);

        return view("comics.show", ["selectedComic" => $selectedComic]);

    }

    public function create() {

        return view("comics.create");

    }

    public function store(Request $request) {

        // Stampa a schermo i dati che l'utente ha inviato tramite form OK
        // dd($request->all());

        // Procedo alla validazione base dei dati ricevuti
        $data = $request->validate([
            
            "title" => "required|string|max 100",
            "description" => "required|size|max 1000",
            "thumb" => "required|image", // Da usare se le imgs finiscono con il formato png, jpg ecc...
            "price" => "required|decimal:1,2|min:1|max:10000",
            "series" => "nullable|string|max 100",
            "sale_date" => "nullable|date|after:today",
            "type" => "required|in:Comic Book,Graphic Novel",
            "artists" => "nullable|string|max 200",
            "writers" => "nullable|string|max 200",
        
        ]);

        // Converto le stringhe in array 
        $data["artists"] = explode(",", $data["artists"]);
        $data["writers"] = explode(",", $data["writers"]);

        $newComic = new Comic();

        //Questa funzione mi permette di passargli un array associativo e lui autonomamente va a fare combaciare le proprietà dell'oggeto con le chiavi e i valori dell'array associativo
        $newComic->fill($data);

        // Il fill deve essere configurato su Model, specificando nella proprietà fillable tutte le colonne di cui vogliamo permettere l'assegnazione dei dati
        
        $newComic->save();

        //TODO // Facciamo un redirect perché se l'utente rimanesse sulla stessa pagina e la ricaricasse, verrebbe rieseguito il post, quindi creerebbe un nuovo record
        return redirect()->route('comics.show', $newComic->id);
        // return redirect()->route('comics.index');



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
