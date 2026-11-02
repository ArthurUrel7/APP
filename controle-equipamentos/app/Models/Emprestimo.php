<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    /**
     * Campos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'equipamento_id', 
        'solicitante', 
        'data_retirada', 
        'data_devolucao', 
        'status'
    ];

    /**
     * Relacionamento: Um empréstimo pertence a um equipamento.
     */
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }
}