<?php

namespace App\Http\Controllers\Candidato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Auth;
use Hash;

class MinhaContaController extends Controller{

    public function formAlterarSenha(){
        return view('candidato.alterar_senha');
    }

    // ALTERA A SENHA DO USUÁRIO LOGADO
    public function alterarSenha(Request $request){

        $usuario_logado = Auth::user();

        if((strlen($request->nova_senha) < 6) OR (strlen($request->confirm_nova_senha) < 6)){
            return redirect()->route('candidato.form.alterar.senha')->with('danger', 'Ooops. A senha deve ter no mínimo 6 caracteres!');
        }

        // VERIFICA SE A SENHA ATUAL INFORMADA PELO CANDIDATO É VÁLIDA
        if(Hash::check($request->senha_atual, $usuario_logado->password)){

            // VERIFICA SE A SENHA E A CONFIRMAÇÃO SÃO IGUAIS
            if(($request->nova_senha == $request->confirm_nova_senha)){

                $usuario = Usuario::find($usuario_logado->id);
                $usuario->password = bcrypt($request->nova_senha);
                $usuario->save();

                return redirect()->route('candidato.form.alterar.senha')->with('success', 'Senha alterada com sucesso!');
            }else{
                return redirect()->route('candidato.form.alterar.senha')->with('danger', 'Ooops. As senhas não correspondem, tente novamente!');
            }
        }else{
            return redirect()->route('candidato.form.alterar.senha')->with('danger', 'Ooops. Essa não é sua senha atual, tente novamente!');
        }
    }
}
