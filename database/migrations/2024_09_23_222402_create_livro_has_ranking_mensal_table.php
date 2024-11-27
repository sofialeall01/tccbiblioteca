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
        Schema::create('livro_has_ranking_mensal', function (Blueprint $table) {
            $table->foreignId('livro_id')->constrained('livro')->onDelete('cascade');
            $table->foreignId('ranking_mensal_id')->constrained('ranking_mensal')->onDelete('cascade');
            $table->primary(['livro_id', 'ranking_mensal_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_has_ranking_mensal');
    }
};
