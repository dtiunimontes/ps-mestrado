<?php

namespace App\Http\Controllers\Candidato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use PDF;
use DB;
use App\Models\Usuario as Candidato;
use App\Models\Inscricao;
use App\Models\LinhaPesquisa;

class CandidatoController extends Controller{

    public function gerarFichaInscricao(){

        $candidato = Candidato::find(Auth::id());

        $inscricao = Inscricao::where('usuarios_id', '=', $candidato->id)->first();

        $linha_pesquisa = LinhaPesquisa::find($inscricao->linha_pesquisa_id);

        $pdf = PDF::loadView('candidato.ficha-inscricao', compact('candidato', 'linha_pesquisa', 'inscricao'));

        return $pdf->stream('FICHA DE INSCRIÇÃO - '.$candidato->nome.'.pdf');
    }
}
