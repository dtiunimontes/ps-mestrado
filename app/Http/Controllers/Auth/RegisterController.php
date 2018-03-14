<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;
use App\Models\Inscricao;
use App\Models\Config;
use App\Models\LinhaPesquisa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller{

    use RegistersUsers;

    protected $redirectTo = '/candidato';

    public function __construct(){
        $this->middleware('guest');
    }

    public function showRegistrationForm(){

        $config = Config::all()->first();
        $linhasPesquisa = LinhaPesquisa::all();

        return view('auth.register', [
            'linhasPesquisa' => $linhasPesquisa,
            'config' => $config,
        ]);
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'nome' => 'required||min:3',
            'pai' => 'required|min:3',
            'mae' => 'required|min:3',
            'nacionalidade' => 'required|min:3',
            'naturalidade' => 'required|min:3',
            'uf' => 'required|min:2',
            'sexo' => 'required|min:1',
            'estado_civil' => 'required',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|confirmed',
            'cpf' => 'required|unique:usuarios|cpf',
            'rg' => 'required|unique:usuarios',
            'emissao_rg' => 'required|data',
            'org_exped' => 'required',
            'data_nasc' => 'required|data',
            'telefone_residencial' => 'required',
            // 'celular' => 'string',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            // 'complemento' => 'string',
            'cidade' => 'required',
            'bairro' => 'required',
            'estado' => 'required',
            'curso_graduacao' => 'required',
            'modalidade' => 'required',
            'instituicao' => 'required',
            'semestre_ano_graduacao' => 'required',
            'cidade_graduacao' => 'required',
            'uf_graduacao' => 'required',
            'necessidades_especiais' => 'required',
            // 'nome_necessidade_especial' => 'required',
            // 'possiveis_orientadores' => 'required'
        ]);
    }

    protected function create(array $data){

        list($dia, $mes, $ano) = explode('/', $data['data_nasc']);
        $data_nasc = $ano.'-'.$mes.'-'.$dia;

        list($dia2, $mes2, $ano2) = explode('/', $data['emissao_rg']);
        $data_emissao_rg = $ano2.'-'.$mes2.'-'.$dia2;

        $candidato = Usuario::create([
            'nome' => strtoupper($data['nome']),
            'pai' => strtoupper($data['pai']),
            'mae' => strtoupper($data['mae']),
            'nacionalidade' => strtoupper($data['nacionalidade']),
            'naturalidade' => strtoupper($data['naturalidade']),
            'uf' => strtoupper($data['uf']),
            'sexo' => strtoupper($data['sexo']),
            'estado_civil' => strtoupper($data['estado_civil']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cpf' => strtoupper($data['cpf']),
            'rg' => strtoupper($data['rg']),
            'emissao_rg' => $data_emissao_rg,
            'org_exped' => strtoupper($data['org_exped']),
            'data_nasc' => $data_nasc,
            'telefone_residencial' => strtoupper($data['telefone_residencial']),
            'celular' => strtoupper($data['celular']),
            'cep' => strtoupper($data['cep']),
            'logradouro' => strtoupper($data['logradouro']),
            'numero' => strtoupper($data['numero']),
            'complemento' => strtoupper($data['complemento']),
            'cidade' => strtoupper($data['cidade']),
            'bairro' => strtoupper($data['bairro']),
            'estado' => strtoupper($data['estado']),
            'curso_graduacao' => strtoupper($data['curso_graduacao']),
            'modalidade' => strtoupper($data['modalidade']),
            'instituicao' => strtoupper($data['instituicao']),
            'semestre_ano_graduacao' => strtoupper($data['semestre_ano_graduacao']),
            'cidade_graduacao' => strtoupper($data['cidade_graduacao']),
            'uf_graduacao' => strtoupper($data['uf_graduacao']),
            'necessidades_especiais' => (!empty($data['necessidades_especiais'])) ? strtoupper($data['necessidades_especiais']) : NULL,
            'nome_necessidade_especial' => strtoupper($data['nome_necessidade_especial']),
            'possiveis_orientadores' => strtoupper($data['possiveis_orientadores']),
        ]);

        Inscricao::create([
            'usuarios_id' => $candidato->id,
            'curso_id' => 1,
            'linha_pesquisa_id' => $data['linha_pesquisa']
        ]);

        return $candidato;
    }
}
