<?php

//TODO Il nome del controller deve essere al singolare, in PascalCase e seguito dalla parola Controller.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

//Devo collegare il Model al relativo Controller
use App\Models\Comic;

class ComicController extends Controller
{

    /**
     * Ritorna la lista di tutti i fumetti all'interno di una view "comics.index"
     *
     * @return View
     */

    public function index(): View {

        $Comicslist = Comic::all();

        foreach ($Comicslist as $key => $Comic) {
            $Comicslist[$key]["shortly_description"] = $this->truncate($Comic["description"], 180);
        }

        return view("comics.index", ["Comics" => $Comicslist]);
    }

    /**
     * Recupera il fumetto che corrisponde all'id ricevuto come argomento
     * e lo ritorna all'interno di una view "comics.show"
     *
     * @param int $id ID del fumetto da visualizzare
     * @return View
     */

    public function show($id): View {

        $selectedComic = Comic::findOrFail($id);

        return view("comics.show", ["selectedComic" => $selectedComic]);
    }

    /**
     * Ritorna una view "comics.create" per la creazione di un nuovo fumetto
     * La view conterrà un form per poter inserire i dati del fumetto
     *
     * @return View
     */

    public function create(): View {

        return view("comics.create");
    }

    /**
     * Riceve i dati inviati dal form create e li salva nel database creando un nuovo record nella tabella comics
     *
     * @param Request $request
     * @return RedirectResponse
     */

    public function store(Request $request): RedirectResponse
    {

        // Stampa a schermo i dati che l'utente ha inviato tramite form
        // dd($request->all());

        // Procedo alla validazione base dei dati ricevuti
        $data = $request->validate([

            "title" => "required|string|max:100",
            "description" => "required|string|min:1|max:1000",
            "thumb" => "required|url",
            "price" => "required|decimal:1,2|min:1|max:10000",
            "series" => "nullable|string|max:100",
            "sale_date" => "nullable|date|after:today",
            "type" => "required|in:Comic Book,Graphic Novel",
            "artists" => "nullable|string|max:200",
            "writers" => "nullable|string|max:200",

        ]);

        $data["artists"] = json_encode([$data["artists"]]);
        $data["writers"] = json_encode([$data["writers"]]);

        $newComic = new Comic();

        //Questa funzione mi permette di passargli un array associativo e lui autonomamente va a fare combaciare le proprietà dell'oggeto con le chiavi e i valori dell'array associativo
        $newComic->fill($data);

        // Il fill deve essere configurato su Model, specificando nella proprietà fillable tutte le colonne di cui vogliamo permettere l'assegnazione dei dati

        $newComic->save();

        //TODO // Facciamo un redirect perché se l'utente rimanesse sulla stessa pagina e la ricaricasse, verrebbe rieseguito il post, quindi creerebbe un nuovo record
        return redirect()->route('comics.show', $newComic->id);
        // return redirect()->route('comics.index');

    }

    /**
     * Ritorna una view "comics.edit" con all'interno un form per modificare i dati del gioco che corrisponde all'id ricevuto come argomento
     *
     * @param int $id ID del gioco da modificare
     * @return View
     */

    public function edit(int $id): View {

        // Recupero il fumetto che corrisponde all'id ricevuto come argomento
        $selectedComic = Comic::findOrFail($id);

        return view("comics.edit", ["selectedComic" => $selectedComic]);
    }

    /**
     * Riceve i dati inviati dal form edit e aggiorna il fumetto che corrisponde
     * all'id indicato come argomento
     *
     * @param Request $request
     * @param int $id ID del gioco da modificare
     * @return RedirectResponse
     */

    public function update(Request $request, int $id): RedirectResponse {
        
        // Recupero il fumetto che corrisponde all'id ricevuto come argomento
        $selectedComic = Comic::findOrFail($id);

        // Valido i dati ricevuti dal form
        $modifiedData = $request->validate([

            "title" => "required|string|max:100",
            "description" => "required|string|min:1|max:1000",
            "thumb" => "required|url",
            "price" => "required|decimal:1,2|min:1|max:10000",
            "series" => "nullable|string|max:100",
            "sale_date" => "nullable|date|after:today",
            "type" => "required|in:Comic Book,Graphic Novel",
            "artists" => "nullable|string|max:200",
            "writers" => "nullable|string|max:200",

        ]);

        $modifiedData["artists"] = json_encode([$modifiedData["artists"]]);
        $modifiedData["writers"] = json_encode([$modifiedData["writers"]]);

        // Aggiorno i dati del gioco tramite. Questa funzione esegue 2 azioni dietro le quinte: fill() e save()
        $selectedComic->update($modifiedData);

        return redirect()->route('comics.show', $selectedComic->id);

    }


    private function truncate($text, $chars = 25)
    {
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
