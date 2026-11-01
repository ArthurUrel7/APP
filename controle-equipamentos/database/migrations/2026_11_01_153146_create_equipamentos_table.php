<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('patrimonio')->unique();
            $table->string('tipo'); // Computador, Notebook, Tablet
            $table->string('marca');
            $table->string('modelo');
            $table->string('local');
            $table->string('status')->default('Disponível');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipamentos');
    }
};