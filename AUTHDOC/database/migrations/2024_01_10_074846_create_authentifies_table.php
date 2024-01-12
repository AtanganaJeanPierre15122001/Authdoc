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
        Schema::create('authentifies', function (Blueprint $table) {
            $table->id();
            $table->string('releve');
            $table->unsignedBigInteger('utilisateur');
            $table->foreign('releve')->references('id_releve')->on('releves')->onDelete('cascade');
            $table->foreign('utilisateur')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authentifies');
    }
};
