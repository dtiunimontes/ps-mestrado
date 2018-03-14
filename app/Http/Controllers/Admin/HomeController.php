<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inscricao;

class HomeController extends Controller{

    public function index(){

        $numeroInscricoesDesenvolvimentoEconomico = Inscricao::where('linha_pesquisa_id', '=', 1)->count();
        $numeroInscricoesEstrategiaFinancasEmpresariais = Inscricao::where('linha_pesquisa_id', '=', 2)->count();

        return view('admin.home', compact('numeroInscricoesDesenvolvimentoEconomico', 'numeroInscricoesEstrategiaFinancasEmpresariais'));
    }
}
