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
        Schema::create('releves', function (Blueprint $table) {
            $table->string('id_releve')->primary();
            $table->string('annee_academique');
            $table->float('credits_cap');
            $table->float('moy_gen_pon');
            $table->string('decision_rel');
            $table->string('filiere');
            $table->string('matricule');
            $table->foreign('filiere')->references('id_filiere')->on('fileres')->onDelete('cascade');
            $table->foreign('matricule')->references('matricule')->on('etudiants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releves');
    }
};
