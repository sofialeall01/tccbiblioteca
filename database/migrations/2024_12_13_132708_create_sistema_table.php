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
        Schema::create('sistema', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); // Define que ao excluir um livro, o registro relacionado na tabela sistema também será excluído
            $table->foreignId('livro_id')->constrained('livro')->onDelete('cascade'); // Define que ao excluir um livro, o registro relacionado na tabela sistema também será excluído
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistema');
    }
};
