<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    use HasFactory;

    // ADICIONE ESTA LINHA:
    protected $table = 'manutencoes'; 

    protected $fillable = ['equipamento_id', 'tipo', 'data_manutencao', 'descricao', 'tecnico', 'custo'];

    public function equipamento() {
        return $this->belongsTo(Equipamento::class);
    }
}