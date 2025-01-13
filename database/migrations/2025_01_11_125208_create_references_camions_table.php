<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('references_camions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dossier_id');
            $table->string('reference'); // Référence unique pour le camion
            $table->foreign('dossier_id')->references('id')->on('dossiers')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('references_camions');
    }
};
