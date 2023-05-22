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
        Schema::create('employeers', function (Blueprint $table) {
            $table->id();
            $table->string('second_first',30);
            $table->string('second_name',30);
            $table->string('sexe',30);
            $table->date('birth_date');
            $table->unsignedBigInteger('fonction_id');
            $table->timestamps();
            $table->foreign('fonction_id')->references('id')->on('fonction_employers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employeers');
    }
};
