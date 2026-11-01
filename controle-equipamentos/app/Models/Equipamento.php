<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model {
    use HasFactory;
    protected $fillable = ['patrimonio', 'tipo', 'marca', 'modelo', 'local', 'status', 'foto'];
}