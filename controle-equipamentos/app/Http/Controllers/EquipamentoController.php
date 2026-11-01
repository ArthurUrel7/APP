<?php
namespace App\Http\Controllers;
use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipamentoController extends Controller {
    public function index() {
        $equipamentos = Equipamento::latest()->get();
        return view('equipamentos.index', compact('equipamentos'));
    }
    public function create() { return view('equipamentos.create'); }
    
    public function store(Request $request) {
        $dados = $request->validate([
            'patrimonio' => 'required|unique:equipamentos',
            'tipo' => 'required', 'marca' => 'required',
            'modelo' => 'required', 'local' => 'required',
            'status' => 'required', 'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('equipamentos', 'public');
        }

        Equipamento::create($dados);
        return redirect()->route('equipamentos.index')->with('success', '✅ Equipamento cadastrado!');
    }
    
    public function edit(Equipamento $equipamento) { 
        return view('equipamentos.edit', compact('equipamento')); 
    }
    
    public function update(Request $request, Equipamento $equipamento) {
        $dados = $request->validate([
            'patrimonio' => 'required|unique:equipamentos,patrimonio,' . $equipamento->id,
            'tipo' => 'required', 'marca' => 'required',
            'modelo' => 'required', 'local' => 'required',
            'status' => 'required', 'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($equipamento->foto) {
                Storage::disk('public')->delete($equipamento->foto);
            }
            $dados['foto'] = $request->file('foto')->store('equipamentos', 'public');
        }

        $equipamento->update($dados);
        return redirect()->route('equipamentos.index')->with('success', '✅ Atualizado!');
    }
    
    public function destroy(Equipamento $equipamento) {
        if ($equipamento->foto) {
            Storage::disk('public')->delete($equipamento->foto);
        }
        $equipamento->delete();
        return redirect()->route('equipamentos.index')->with('success', '🗑️ Excluído!');
    }
}