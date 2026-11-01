<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('equipamentos', function (Blueprint $table) {
            // Apenas a foto, pois o status já existe!
            $table->string('foto')->nullable(); 
        });
    }
    public function down(): void {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};