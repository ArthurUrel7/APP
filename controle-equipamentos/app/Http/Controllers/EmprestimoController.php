<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Equipamento;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::with('equipamento')->latest()->get();
        return view('emprestimos.index', compact('emprestimos'));
    }

    public function create()
    {
        // Só mostra equipamentos que estão disponíveis para empréstimo
        $equipamentos = Equipamento::where('status', 'Disponível')->orderBy('patrimonio')->get();
        return view('emprestimos.create', compact('equipamentos'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'equipamento_id' => 'required|exists:equipamentos,id',
            'solicitante' => 'required',
            'data_retirada' => 'required|date',
            'data_devolucao' => 'required|date|after:data_retirada'
        ]);

        $dados['status'] = 'Ativo';
        
        Emprestimo::create($dados);
        
        // Mudar o status do equipamento para "Emprestado"
        Equipamento::find($dados['equipamento_id'])->update(['status' => 'Emprestado']);
        
        return redirect()->route('emprestimos.index')->with('success', '✅ Empréstimo registrado com sucesso!');
    }

    public function devolver(Emprestimo $emprestimo)
    {
        // Marca como devolvido
        $emprestimo->update(['status' => 'Devolvido']);
        
        // Volta o equipamento para disponível
        $emprestimo->equipamento->update(['status' => 'Disponível']);
        
        return redirect()->route('emprestimos.index')->with('success', '✅ Equipamento devolvido!');
    }

    public function destroy(Emprestimo $emprestimo)
    {
        // Se o equipamento estava emprestado, volta a ficar disponível ao excluir o registro
        if ($emprestimo->status == 'Ativo') {
            $emprestimo->equipamento->update(['status' => 'Disponível']);
        }
        
        $emprestimo->delete();
        
        return redirect()->route('emprestimos.index')->with('success', '🗑️ Registro de empréstimo excluído!');
    }
}