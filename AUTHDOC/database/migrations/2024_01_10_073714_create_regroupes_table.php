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
        Schema::create('regroupes', function (Blueprint $table) {
            $table->id();
            $table->string('filiere');
            $table->string('ue');
            $table->foreign('filiere')->references('id_filiere')->on('fileres')->onDelete('cascade');
            $table->foreign('ue')->references('id_ue')->on('ues')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regroupes');
    }
};
