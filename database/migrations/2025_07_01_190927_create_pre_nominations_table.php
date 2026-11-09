<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_nominations', function (Blueprint $table) {
            $table->id();
            $table->string('nom_artiste'); // ✅ nom de l’artiste proposé
            $table->string('lien');        // ✅ lien YouTube, audio, etc.
            $table->string('categorie');   // ✅ nom de la catégorie choisie
            $table->text('motivation');    // ✅ pourquoi cette proposition
            $table->string('nom_proposant')->nullable(); // optionnel
            $table->string('contact')->nullable();       // email ou téléphone
            $table->string('image')->nullable();         // optionnel si tu veux gérer des images plus tard
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
        Schema::dropIfExists('pre_nominations');
    }
};
