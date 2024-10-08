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
        Schema::create('appartenirs', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('ue');
            $table->string('id_releve');
            $table->unsignedBigInteger('id_note');
            $table->foreign('matricule')->references('matricule')->on('etudiants')->onDelete('cascade');
            $table->foreign('ue')->references('id_ue')->on('ues')->onDelete('cascade');
            $table->foreign('id_note')->references('id')->on('notes')->onDelete('cascade');
            $table->foreign('id_releve')->references('id_releve')->on('releves')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appartenirs');
    }
};
