@extends('layouts.app')

@section('title', 'INSCRIÇÃO - MESTRADO PROFISSIONAL EM DESENVOLVIMENTO ECONÔMICO E ESTRATÉGIA EMPRESARIAL - PPGDEE DA UNIMONTES')
@section('content')

@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        $(".nome_necessidade_especial_class").hide();

        $("#necessidades_especiais").change(function(){

            var necessidade_especial = $("#necessidades_especiais").val();

            if(necessidade_especial == "SIM"){
                $(".nome_necessidade_especial_class").show();
            }else{
                $(".nome_necessidade_especial_class").hide();
            }
        });

        if($("#cep").val() != ''){

            var cep = $('#cep').val();

            $.ajax({
                url: 'http://api.postmon.com.br/v1/cep/'+cep,
                type: 'GET',
                dataType: 'json',
                success: function(json){
                    if(typeof json.estado != 'undefined'){
                        $('#cidade').val(json.cidade);
                        $('#logradouro').val(json.logradouro);
                        $('#bairro').val(json.bairro);
                        $('#estado').html('<option value="'+json.estado+'">'+json.estado+'</option>');
                    }
                }
            });
        }

        $('#cep').blur(function(){

            var cep = $('#cep').val();

            $.ajax({
                url: 'http://api.postmon.com.br/v1/cep/'+cep,
                type: 'GET',
                dataType: 'json',
                success: function(json){
                    if(typeof json.estado != 'undefined'){
                        $('#cidade').val(json.cidade);
                        $('#logradouro').val(json.logradouro);
                        $('#bairro').val(json.bairro);
                        $('#estado').val(json.estado);
                    }
                }
            });
       });

        $('#btn_submit').submit(function(){
            $('#btn_submit').attr('disabled', 'disabled');
        });
    });
</script>
@endpush

@if(date('Y-m-d H:i') <= formatarDataHoraExtensoUSA($config->termino_inscricoes))

{{ Form::open(['url' => route('register'), 'method' => 'post']) }}

<h3 class="form-section">Instruções</h3>
<div class="row">
    <div class="col-md-12">
        <div class="note note-info">
            <h5> - Preecha os campos obrigatórios (<span style="color: red;">*</span>) abaixo e depois clique no botão <b>"Realizar Inscrição"</b> para realizar sua inscrição no <b>MESTRADO PROFISSIONAL EM DESENVOLVIMENTO ECONÔMICO E ESTRATÉGIA EMPRESARIAL - PPGDEE DA UNIMONTES.</b></h5>
            <h5> - Se você já realizou inscrição, poderá acessar a <b>área do candidato</b> clicando em <b>"Entrar"</b> na parte superior direita, ou clicando <a href="{{ route('login') }}">aqui</a>.</h5>
        </div>
    </div>
</div>

<h3 class="form-section">Dados Pessoais</h3>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
            <label for="nome">Nome completo: <span class="required">*</span></label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required="" pattern="[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s]+$">
            @if ($errors->has('nome'))
                <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('cpf') ? ' has-error' : '' }}">
            <label for="cpf">CPF: <span class="required">*</span></label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" required>
            @if ($errors->has('cpf'))
                <span class="help-block">
                    <strong>{{ $errors->first('cpf') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('pai') ? ' has-error' : '' }}">
            <label for="pai">Nome do Pai: <span class="required">*</span></label>
            <input type="text" class="form-control" id="pai" name="pai" value="{{ old('pai') }}" pattern="[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s]+$">
            @if ($errors->has('pai'))
                <span class="help-block">
                    <strong>{{ $errors->first('pai') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('mae') ? ' has-error' : '' }}">
            <label for="mae">Nome da Mãe: <span class="required">*</span></label>
            <input type="text" class="form-control" id="mae" name="mae" value="{{ old('mae') }}" pattern="[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s]+$">
            @if ($errors->has('mae'))
                <span class="help-block">
                    <strong>{{ $errors->first('mae') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group {{ $errors->has('nacionalidade') ? ' has-error' : '' }}">
            <label for="nacionalidade">Nacionalidade: <span class="required">*</span></label>
            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="{{ old('nacionalidade') }}" required>
            @if ($errors->has('nacionalidade'))
                <span class="help-block">
                    <strong>{{ $errors->first('nacionalidade') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group {{ $errors->has('naturalidade') ? ' has-error' : '' }}">
            <label for="naturalidade">Naturalidade: <span class="required">*</span></label>
            <input type="text" class="form-control" id="naturalidade" name="naturalidade" value="{{ old('naturalidade') }}" required>
            @if ($errors->has('naturalidade'))
                <span class="help-block">
                    <strong>{{ $errors->first('naturalidade') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('uf') ? ' has-error' : '' }}">
            <label for="uf">UF: <span class="required">*</span></label>
            <input type="text" class="form-control" id="uf" name="uf" value="{{ old('uf') }}" required>
            @if ($errors->has('uf'))
                <span class="help-block">
                    <strong>{{ $errors->first('uf') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('data_nasc') ? ' has-error' : '' }}">
            <label for="data_nasc">Data de nascimento: <span class="required">*</span></label>
            <input type="text" class="form-control" id="data_nasc" name="data_nasc" value="{{ old('data_nasc') }}" required>
            @if ($errors->has('data_nasc'))
                <span class="help-block">
                    <strong>{{ $errors->first('data_nasc') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('sexo') ? ' has-error' : '' }}">
            <label for="sexo">Sexo: <span class="required">*</span></label><br>
            <label class="radio-inline">
                <input type="radio" name="sexo" id="sexo_feminino" value="FEMININO" checked> Feminino
            </label>
            <label class="radio-inline">
                <input type="radio" name="sexo" id="sexo_masculino" value="MASCULINO"> Masculino
            </label>
            @if ($errors->has('sexo'))
                <span class="help-block">
                    <strong>{{ $errors->first('sexo') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group {{ $errors->has('estado_civil') ? ' has-error' : '' }}">
            <label>Estado Civil: <span class="required">*</span></label>
            <input type="text" class="form-control" name="estado_civil" value="{{ old('estado_civil') }}" required>
            @if ($errors->has('estado_civil'))
                <span class="help-block">
                    <strong>{{ $errors->first('estado_civil') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('rg') ? ' has-error' : '' }}">
            <label for="rg">RG: <span class="required">*</span></label>
            <input type="text" class="form-control" id="rg" name="rg" value="{{ old('rg') }}" required placeholder="Ex: MG-00.000.000">
            @if ($errors->has('rg'))
                <span class="help-block">
                    <strong>{{ $errors->first('rg') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('org_exped') ? ' has-error' : '' }}">
            <label>Org. Exp do RG: <span class="required">*</span></label>
            <input type="text" class="form-control" name="org_exped" value="{{ old('org_exped') }}" maxlength="10" required placeholder="Ex: SSP/MG">
            @if ($errors->has('org_exped'))
                <span class="help-block">
                    <strong>{{ $errors->first('org_exped') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
            <div class="form-group {{ $errors->has('emissao_rg') ? ' has-error' : '' }}">
            <label>Data de Emissão do RG: <span class="required">*</span></label>
            <input type="text" class="form-control" id="emissao_rg" name="emissao_rg" value="{{ old('emissao_rg') }}" maxlength="10" required>
            @if ($errors->has('emissao_rg'))
                <span class="help-block">
                    <strong>{{ $errors->first('emissao_rg') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<h3 class="form-section">Endereço</h3>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-mail: <span class="required">* (E-mail existente)</span></label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('telefone_residencial') ? ' has-error' : '' }}">
            <label for="telefone_residencial">Telefone Residencial: <span class="required">*</span></label>
            <input type="text" class="form-control" id="telefone_residencial" name="telefone_residencial" value="{{ old('telefone_residencial') }}" required>
            @if ($errors->has('telefone_residencial'))
                <span class="help-block">
                    <strong>{{ $errors->first('telefone_residencial') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('celular') ? ' has-error' : '' }}">
            <label for="celular">Celular: <span class="required"></span></label>
            <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular') }}">
            @if ($errors->has('celular'))
                <span class="help-block">
                    <strong>{{ $errors->first('celular') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('cep') ? ' has-error' : '' }}">
            <label for="cep">CEP: <span class="required">*</span></label>
            <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') }}" required>
            @if ($errors->has('cep'))
                <span class="help-block">
                    <strong>{{ $errors->first('cep') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group {{ $errors->has('logradouro') ? ' has-error' : '' }}">
            <label for="logradouro">Endereço: <span class="required">*</span></label>
            <input type="text" class="form-control" id="logradouro" name="logradouro" value="{{ old('logradouro') }}" required>
            @if ($errors->has('logradouro'))
                <span class="help-block">
                    <strong>{{ $errors->first('logradouro') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group {{ $errors->has('numero') ? ' has-error' : '' }}">
            <label for="numero">Número: <span class="required">*</span></label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero') }}" required>
            @if ($errors->has('numero'))
                <span class="help-block">
                    <strong>{{ $errors->first('numero') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('complemento') ? ' has-error' : '' }}">
            <label for="complemento">Complemento: </label>
            <input type="text" class="form-control" id="complemento" name="complemento" value="{{ old('complemento') }}">
            @if ($errors->has('complemento'))
                <span class="help-block">
                    <strong>{{ $errors->first('complemento') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('bairro') ? ' has-error' : '' }}">
            <label for="bairro">Bairro: <span class="required">*</span></label>
            <input type="text" class="form-control" id="bairro" name="bairro" value="{{ old('bairro') }}" required>
            @if ($errors->has('bairro'))
                <span class="help-block">
                    <strong>{{ $errors->first('bairro') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('cidade') ? ' has-error' : '' }}">
            <label for="cidade">Cidade: <span class="required">*</span></label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}" required>
            @if ($errors->has('cidade'))
                <span class="help-block">
                    <strong>{{ $errors->first('cidade') }}</strong>
                </span>
            @endif
        </div>
    </div>
   <div class="col-md-4">
        <div class="form-group {{ $errors->has('estado') ? ' has-error' : '' }}">
            <label for="estado">Estado: <span class="required">*</span></label>
            <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado') }}" required>
            @if ($errors->has('estado'))
                <span class="help-block">
                    <strong>{{ $errors->first('estado') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<h3 class="form-section">Formação Acadêmica</h3>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('curso_graduacao') ? ' has-error' : '' }}">
            <label for="curso_graduacao">Curso de Graduação: <span class="required">*</span></label>
            <input type="text" class="form-control" id="curso_graduacao" name="curso_graduacao" value="{{ old('curso_graduacao') }}" required>
            @if ($errors->has('curso_graduacao'))
                <span class="help-block">
                    <strong>{{ $errors->first('curso_graduacao') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('modalidade') ? ' has-error' : '' }}">
            <label for="modalidade">Modalidade: <span class="required">*</span></label>
            <select name="modalidade" id="modalidade" class="form-control" value="{{ old('modalidade') }}">
                <option value="Bacharelado">Bacharelado</option>
                <option value="Licenciatura">Licenciatura</option>
                <option value="Bacharelado e Licenciatura">Bacharelado e Licenciatura</option>
            </select>
            @if ($errors->has('modalidade'))
                <span class="help-block">
                    <strong>{{ $errors->first('modalidade') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('instituicao') ? ' has-error' : '' }}">
            <label for="instituicao">Nome da Instituição: <span class="required">*</span></label>
            <input type="text" class="form-control" id="instituicao" name="instituicao" value="{{ old('instituicao') }}" required>
            @if ($errors->has('instituicao'))
                <span class="help-block">
                    <strong>{{ $errors->first('instituicao') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('semestre_ano_graduacao') ? ' has-error' : '' }}">
            <label for="semestre_ano_graduacao">Semestre/Ano (da graduação): <span class="required">*</span></label>
            <input type="text" class="form-control" id="semestre_ano_graduacao" name="semestre_ano_graduacao" value="{{ old('semestre_ano_graduacao') }}" required>
            @if ($errors->has('semestre_ano_graduacao'))
                <span class="help-block">
                    <strong>{{ $errors->first('semestre_ano_graduacao') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('cidade_graduacao') ? ' has-error' : '' }}">
            <label for="cidade_graduacao">Cidade: <span class="required">*</span></label>
            <input type="text" class="form-control" id="cidade_graduacao" name="cidade_graduacao" value="{{ old('cidade_graduacao') }}" required>
            @if ($errors->has('cidade_graduacao'))
                <span class="help-block">
                    <strong>{{ $errors->first('cidade_graduacao') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('uf_graduacao') ? ' has-error' : '' }}">
            <label for="uf_graduacao">UF: <span class="required">*</span></label>
            <input type="text" class="form-control" id="uf_graduacao" name="uf_graduacao" value="{{ old('uf_graduacao') }}" required>
            @if ($errors->has('uf_graduacao'))
                <span class="help-block">
                    <strong>{{ $errors->first('uf_graduacao') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('necessidades_especiais') ? ' has-error' : '' }}">
            <label for="necessidades_especiais">Necessidades Especiais: <span class="required">*</span></label>
            <select name="necessidades_especiais" id="necessidades_especiais" class="form-control" value="{{ old('necessidades_especiais') }}">
                <option value="NÃO">Não</option>
                <option value="SIM">Sim</option>
            </select>
            @if ($errors->has('necessidades_especiais'))
                <span class="help-block">
                    <strong>{{ $errors->first('necessidades_especiais') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('nome_necessidade_especial') ? ' has-error' : '' }} nome_necessidade_especial_class">
            <label for="nome_necessidade_especial">Qual? <span class="required"></span></label>
            <input type="text" class="form-control" id="nome_necessidade_especial" name="nome_necessidade_especial" value="{{ old('nome_necessidade_especial') }}">
            @if ($errors->has('nome_necessidade_especial'))
                <span class="help-block">
                    <strong>{{ $errors->first('nome_necessidade_especial') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('possiveis_orientadores') ? ' has-error' : '' }}">
            <label for="possiveis_orientadores">INDICAÇÃO (facultativa) DE POSSÍVEL(IS) ORIENTADOR(ES) ENTRE OS DOCENTES DO PPGDEE (para informações sobre estes, sua formação, interesses de pesquisa e publicação, vide o site do PPGDEE currículo Lattes de cada docente, localizado pelo nome completo em <a href="http://www.cnpq.br" target="_blank">www.cnpq.br</a>)</label>
            <textarea class="form-control" id="possiveis_orientadores" name="possiveis_orientadores">{{ old('possiveis_orientadores') }}</textarea>
            @if ($errors->has('possiveis_orientadores'))
                <span class="help-block">
                    <strong>{{ $errors->first('possiveis_orientadores') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<h3 class="form-section">Escolha uma linha de Pesquisa do PPGDEE</h3>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group {{ $errors->has('linha_pesquisa') ? ' has-error' : '' }}">
            <label for="linha_pesquisa">Linha de pesquisa: <span class="required">*</span></label>
            <select class="form-control" name="linha_pesquisa" required>
                @foreach($linhasPesquisa as $lp)
                <option value="{{ $lp->id }}">{{ $lp->nome }}</option>
                @endforeach
            </select>
            @if ($errors->has('linha_pesquisa'))
                <span class="help-block">
                    <strong>{{ $errors->first('linha_pesquisa') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<h3 class="form-section">Cadastre uma Senha</h3>
<div class="row">
    <div class="col-md-12">
        <h5><b>ATENÇÃO!</b> Lembre-se de guardar essa senha. Somente com ela e seu CPF que você poderá acessar a área do candidato.</h5>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="password">Senha: <span class="required">*</span></label>
            <input type="password" id="password" name="password" class="form-control" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="password_confirmation">Confirme a Senha: <span class="required">*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>
    </div>
</div>
<h3 class="form-section">Declaração</h3>
<div class="row">
    <div class="col-md-12">
        <div class="note note-info">
            <h4 class="block"><strong>Nota:</strong></h4>
            <p> Com o preenchimento da Ficha de Inscrição, o candidato declara: </p>
            <p>a) estar ciente e aceitar as normas constantes no Edital.</p>
            <p>b) o preenchimento desta ficha e as informações prestadas são de inteira responsabilidade do(a) candidato(a) .</p>
            <p>c) ao cadastrar sua senha, você poderá acessar a área do candidato posteriormente.</p>
        </div>
    </div>
    <div class="col-md-12">
        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" required > Declaro atender as condições exigidas para inscrição, conhecer o Edital do Processo e concordo com o mesmo.
            <span></span>
        </label>
    </div>
</div>
<div class="text-right">
    <button type="submit" id="btn_submit" class="btn bg-green-jungle bg-font-green-jungle">Realizar Inscrição</button>
</div>

{{ Form::close() }}

@else
<h3 class="text-center" style="color: #666666;"><strong>As inscrições foram encerradas em {{ formatarDataUSAParaBR($config->termino_inscricoes) }}!</strong></h3>
@endif

@endsection
