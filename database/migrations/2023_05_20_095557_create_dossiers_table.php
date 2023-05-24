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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("client_id");
            $table->unsignedBigInteger("destination_id");

            $table->string("type_marchandise");
            $table->string("chauffeur");
            $table->string("plaque");
            $table->string("provenance");
            $table->float("montant_init")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
