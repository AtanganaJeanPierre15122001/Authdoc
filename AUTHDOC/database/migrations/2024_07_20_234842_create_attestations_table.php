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
        Schema::create('attestations', function (Blueprint $table) {
            $table->string('id_attestation')->primary();
            $table->string('annee_academique');
            $table->string('mention');
            $table->float('moy_gen_pon');
            $table->string('filiere');
            $table->string('matricule');
//            $table->longBlob('image')->nullable();
            $table->foreign('filiere')->references('id_filiere')->on('fileres')->onDelete('cascade');
            $table->foreign('matricule')->references('matricule')->on('etudiants')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attestations');
    }
};
