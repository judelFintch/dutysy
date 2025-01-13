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
        Schema::create('transaction_money', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_account_id'); // Compte source
            $table->unsignedBigInteger('to_account_id');   // Compte destination
            $table->decimal('amount', 15, 2);              // Montant transféré
            $table->string('currency', 3)->default('USD'); // Devise (exemple : USD, EUR)
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // État de la transaction
            $table->string('transaction_type')->nullable(); // Type de transaction (ex: transfert, dépôt)
            $table->text('description')->nullable();       // Description ou note sur la transaction
            $table->timestamp('processed_at')->nullable(); // Date et heure de traitement
            $table->timestamps();

            // Clés étrangères
            $table->foreign('from_account_id')->references('id')->on('caisses')->onDelete('cascade');
            $table->foreign('to_account_id')->references('id')->on('caisses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_money');
    }
};
