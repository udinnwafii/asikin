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
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tingkat_studi');
            $table->unsignedBigInteger('id_negara');
            $table->timestamps();

            $table->foreign('id_tingkat_studi')->references('id')->on('tingkat_studis');
            $table->foreign('id_negara')->references('id')->on('negaras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};
