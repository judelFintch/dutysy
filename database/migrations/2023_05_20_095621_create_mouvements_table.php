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
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("dossier_id");
            $table->string("type")->default("entree");
            $table->string("libelle");
            $table->float("montant");
            $table->string("motif");
            $table->string("beneficiaire");
            $table->string("observation");
            $table->unsignedBigInteger("caisse_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouvements');
    }
};
