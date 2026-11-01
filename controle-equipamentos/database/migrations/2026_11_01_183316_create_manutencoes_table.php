<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('manutencoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipamento_id')->constrained()->onDelete('cascade');
            $table->string('tipo'); // Preventiva, Corretiva
            $table->date('data_manutencao');
            $table->text('descricao');
            $table->string('tecnico');
            $table->decimal('custo', 10, 2)->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('manutencoes'); }
};