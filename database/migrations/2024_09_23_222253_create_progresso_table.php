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
        Schema::create('progresso', function (Blueprint $table) {
            $table->id();
            $table->integer('pagina_atual');
            $table->string('data_ultima_atualizacao', 45);
            $table->foreignId('livro_id')->constrained('livro')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progresso');
    }
};
