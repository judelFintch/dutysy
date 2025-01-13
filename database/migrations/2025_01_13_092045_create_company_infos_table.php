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
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'entreprise
            $table->string('address'); // Adresse complète
            $table->string('phone', 20); // Numéro de téléphone
            $table->string('email_primary'); // Email principal
            $table->string('email_secondary')->nullable(); // Email secondaire
            $table->string('website')->nullable(); // Site web
            $table->string('nif')->unique(); // Numéro NIF
            $table->string('rccm')->unique(); // Numéro RCCM
            $table->string('type_of_company'); // Type de société (ex : SARL, SA)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_infos');
    }
};
