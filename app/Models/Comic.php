<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Il Model è una rappresentazione sotto forma di classe di una tabella del nostro Database. 

//Tramite questa classe possiamo accedere ed interagire con i dati di quella tabella. 

//TODO Il nome deve essere lo stesso della tabella del DB a cui si riferisce, però al singolare, in PascalCase.

class Comic extends Model {

    use HasFactory;

}
