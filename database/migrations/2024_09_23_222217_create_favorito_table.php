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
        Schema::create('favorito', function (Blueprint $table) {
            $table->foreignId('livro_id')->constrained('livro')->onDelete('cascade');
            $table->primary(['livro_id', 'user_id']);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Alterado para 'users'

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorito');
    }
};
