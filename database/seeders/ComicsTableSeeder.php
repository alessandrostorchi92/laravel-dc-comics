<?php

//TODO Il nome del seeder deve essere in PascalCase, iniziare con il nome della tabella che vogliamo popolare e finire con TableSeeder.

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Devo collegare il Model al relativo Controller
use App\Models\Comic;

// Lo scopo del Seeder è quello di metterci a disposizione un sistema per inserire dei dati in una tabella. Nel inserire i dati, questi devono corrispondere con la tipologia mySql di ogni colonna.

class ComicsTableSeeder extends Seeder {


    
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
        
    }
}
