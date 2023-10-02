<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Ci permettono di manipolare la struttura delle tabelle del database. Possiamo aggiungere, togliere colonne, modificarne gli attributi ed i tipi oppure possiamo completamente eliminare o creare una tabella.

// Tutto quello che faccio nella migration sono tutte operazioni di MySql.

//TODO Il nome deve essere al plurale, minuscolo e in snake_case.

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {

            $table->id();

            $table->string("title", 100);
            $table->text("description");
            $table->string("thumb");
            $table->decimal("price", 5, 2);
            $table->string("series");
            $table->date("sale_date")->nullable();
            $table->string("type", 50);
            $table->json('artists');
            $table->json('writers');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
};
