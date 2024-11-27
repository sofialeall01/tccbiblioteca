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
        Schema::create('autor_has_livro', function (Blueprint $table) {
            $table->foreignId('autor_id')->constrained('autor')->onDelete('cascade');
            $table->foreignId('livro_id')->constrained('livro')->onDelete('cascade');
            $table->primary(['autor_id', 'livro_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autor_has_livro');
    }
};
