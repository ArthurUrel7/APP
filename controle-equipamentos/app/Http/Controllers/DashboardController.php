<?php
namespace App\Http\Controllers;
use App\Models\Equipamento;

class DashboardController extends Controller {
    public function index() {
        $stats = [
            'total' => Equipamento::count() ?? 0,
            'computadores' => Equipamento::where('tipo', 'Computador')->count() ?? 0,
            'notebooks' => Equipamento::where('tipo', 'Notebook')->count() ?? 0,
            'tablets' => Equipamento::where('tipo', 'Tablet')->count() ?? 0,
        ];
        return view('dashboard', compact('stats'));
    }
}