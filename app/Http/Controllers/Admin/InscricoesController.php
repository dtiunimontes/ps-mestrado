<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LinhaPesquisa;
use Excel;
use DB;

class InscricoesController extends Controller{

    public function showFormGerarListaInscritos(){

        $linhasPesquisa = LinhaPesquisa::all();

        return view('admin.form-gerar-lista-inscritos', compact('linhasPesquisa'));
    }

    public function gerarListaInscritos(Request $request){

        $linhaPesquisa = LinhaPesquisa::find($request->linha_pesquisa);

        $inscritos = DB::table('inscricoes')
                        ->join('usuarios', 'usuarios.id', '=', 'inscricoes.usuarios_id')
                        ->where('inscricoes.linha_pesquisa_id', '=', $request->linha_pesquisa)
                        ->get()
                        ->toArray();

        $posicao = 0;
        $inscritosArray = [];

        foreach($inscritos as $inscrito){

            $posicao++;
            $inscrito = (array) $inscrito;

            $array = [
                'Posição' => $posicao,
                'Candidato' => strtoupper($inscrito['nome']),
                'E-mail' => $inscrito['email'],
                'CPF' => strtoupper($inscrito['cpf']),
                'RG' => strtoupper($inscrito['rg']),
                'Data de Nascimento' => date('d/m/Y', strtotime($inscrito['data_nasc'])),
                'Telefone Residencial' => strtoupper($inscrito['telefone_residencial']),
                'Celular' => strtoupper($inscrito['celular']),
                'Pai' => strtoupper($inscrito['pai']),
                'Mae' => strtoupper($inscrito['mae']),
                'Nacionalidade' => strtoupper($inscrito['nacionalidade']),
                'Naturalidade' => strtoupper($inscrito['naturalidade']),
                'UF' => strtoupper($inscrito['uf']),
                'Sexo' => strtoupper($inscrito['sexo']),
                'Estado Civil' => strtoupper($inscrito['estado_civil']),
                'Data de Emissão RG' => date('d/m/Y', strtotime($inscrito['emissao_rg'])),
                'Órgão Expeditor' => strtoupper($inscrito['org_exped']),
                'CEP' => strtoupper($inscrito['cep']),
                'Logradouro' => strtoupper($inscrito['logradouro']),
                'Número' => strtoupper($inscrito['numero']),
                'Complemento' => strtoupper($inscrito['complemento']),
                'Cidade' => strtoupper($inscrito['cidade']),
                'Bairro' => strtoupper($inscrito['bairro']),
                'Estado' => strtoupper($inscrito['estado']),
                'Curso de Graduação' => strtoupper($inscrito['curso_graduacao']),
                'Modalidade' => strtoupper($inscrito['modalidade']),
                'Instituição' => strtoupper($inscrito['instituicao']),
                'Semestre/Ano de Graduação' => strtoupper($inscrito['semestre_ano_graduacao']),
                'Cidade da Graduação' => strtoupper($inscrito['cidade_graduacao']),
                'UF da Graduação' => strtoupper($inscrito['uf_graduacao']),
                'Necessidades Especiais?' => strtoupper($inscrito['necessidades_especiais']),
                'Qual?' => strtoupper($inscrito['nome_necessidade_especial']),
                'Possíveis Orientadores' => strtoupper($inscrito['possiveis_orientadores'])
            ];

            $inscritosArray[] = $array;
        }

        // Gera o XLS
        \Excel::create($linhaPesquisa->nome, function($excel) use ($inscritosArray){
                $excel->sheet('sheet', function($sheet) use ($inscritosArray){
                    $sheet->fromArray($inscritosArray, null, 'A1', true);
                });
        })->export('xls');
    }
}
