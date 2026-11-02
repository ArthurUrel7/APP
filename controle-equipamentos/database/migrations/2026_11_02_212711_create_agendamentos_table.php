<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
    Schema::create('agendamentos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('equipamento_id')->constrained()->onDelete('cascade');
        $table->string('professor');
        $table->string('turma');
        $table->dateTime('data_inicio');
        $table->dateTime('data_fim');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
