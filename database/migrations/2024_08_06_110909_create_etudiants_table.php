<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('telephone')->unique();
            $table->string('matricule')->unique();
            $table->string('mot_de_passe');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->date('date_de_naissance');
            // $table->unsignedBigInteger('classe_id');
            // $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
