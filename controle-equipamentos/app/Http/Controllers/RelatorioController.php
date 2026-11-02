<?php
namespace App\Http\Controllers;
use App\Models\Equipamento;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller {
    public function inventario() {
        $equipamentos = Equipamento::orderBy('patrimonio')->get();
        $pdf = Pdf::loadView('relatorios.inventario', compact('equipamentos'));
        return $pdf->download('inventario_equipamentos.pdf');
    }
}