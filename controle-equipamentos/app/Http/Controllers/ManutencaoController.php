<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Manutencao;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    public function index()
    {
        $manutencoes = Manutencao::with('equipamento')->latest('data_manutencao')->get();
        return view('manutencoes.index', compact('manutencoes'));
    }

    public function create()
    {
        $equipamentos = Equipamento::orderBy('patrimonio')->get();
        return view('manutencoes.create', compact('equipamentos'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'equipamento_id' => 'required|exists:equipamentos,id',
            'tipo' => 'required', 
            'data_manutencao' => 'required|date',
            'descricao' => 'required', 
            'tecnico' => 'required',
            'custo' => 'nullable|numeric'
        ]);
        
        Manutencao::create($dados);
        
        // Atualizar status do equipamento automaticamente
        Equipamento::find($dados['equipamento_id'])->update(['status' => 'Manutenção']);

        return redirect()->route('manutencoes.index')->with('success', '✅ Manutenção registrada!');
    }
}