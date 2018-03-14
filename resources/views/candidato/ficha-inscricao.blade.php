<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Folhas de Identificação</title>
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<style media="screen">
			@page { margin: 1cm; };
		</style>
	</head>
	<body>
        <header class="header" style="position: fixed; height:100px;">
            <img src="{{ asset('assets/img/cabecalho.png') }}" class="img-responsive" alt="">
        </header>
        <div class="container" style="font-family: 'Roboto', sans-serif!important;">
            <div class="col-md-12" style="position:absolute; top: 4cm;">
                <div class="col-md-12 text-uppercase text-center">
                    <h4><strong>FICHA DE INSCRIÇÃO Nº {{ $inscricao->id }}</strong></h4>
                </div>
				<div class="col-md-12">
					<table class="table table-condensed">
						<tr class="active">
							<th colspan="3"><strong>1) DADOS PESSOAIS</strong></th>
						</tr>
						<tr>
							<td colspan="2"><strong>NOME: </strong> {{ $candidato->nome }}</td>
							<td><strong>CPF: </strong> {{ $candidato->cpf }}</td>
						</tr>
						<tr>
							<td colspan="3"><strong>FILIAÇÃO - PAI: </strong> {{ $candidato->pai }}</td>
						</tr>
						<tr>
							<td colspan="3"><strong>MÃE: </strong> {{ $candidato->mae }}</td>
						</tr>
						<tr>
							<td><strong>NACIONALIDADE: </strong> {{ $candidato->nacionalidade }}</td>
							<td><strong>NATURALIDADE: </strong> {{ $candidato->naturalidade }}</td>
							<td><strong>UF: </strong> {{ $candidato->uf }}</td>
						</tr>
						<tr>
							<td><strong>DATA DE NASC.: </strong> {{ date('d/m/Y', strtotime($candidato->data_nasc)) }}</td>
							<td><strong>SEXO: </strong> {{ $candidato->sexo }}</td>
							<td><strong>ESTADO CIVIL: </strong> {{ $candidato->estado_civil }}</td>
						</tr>
						<tr>
							<td><strong>RG: </strong> {{ $candidato->rg }}</td>
							<td><strong>EMISSÃO: </strong> {{ date('d/m/Y', strtotime($candidato->emissao_rg)) }}</td>
							<td><strong>ÓRGÃO EXPED.: </strong> {{ $candidato->org_exped }}</td>
						</tr>
					</table>
                </div>
				<div class="col-md-12">
					<table class="table table-condensed">
						<tr class="active">
							<th colspan="3"><strong>2) ENDEREÇO</strong></th>
						</tr>
						<tr>
							<td><strong>AV./RUA: </strong> {{ $candidato->logradouro }}</td>
							<td><strong>NÚMERO: </strong> {{ $candidato->numero }}</td>
							<td><strong>CEP: </strong> {{ $candidato->cep }}</td>
						</tr>
						<tr>
							<td><strong>COMPLEMENTO: </strong> {{ $candidato->complemento }}</td>
							<td colspan="2"><strong>BAIRRO: </strong> {{ $candidato->bairro }}</td>
						</tr>
						<tr>
							<td colspan="2"><strong>CIDADE: </strong> {{ $candidato->cidade }}</td>
							<td><strong>ESTADO: </strong> {{ $candidato->estado }}</td>
						</tr>
						<tr>
							<td><strong>TELEFONE RESIDENCIAL: </strong> {{ $candidato->telefone_residencial }}</td>
							<td><strong>CELULAR: </strong> {{ $candidato->celular }}</td>
							<td><strong>E-MAIL: </strong> {{ $candidato->email }}</td>
						</tr>
					</table>
				</div>
				<div class="col-md-12">
					<table class="table table-condensed">
						<tr class="active">
							<th colspan="3"><strong>3) FORMAÇÃO ACADÊMICA</strong></th>
						</tr>
						<tr>
							<td colspan="2"><strong>CURSO DE GRADUAÇÃO: </strong> {{ $candidato->curso_graduacao }}</td>
							<td><strong>MODALIDADE: </strong> {{ $candidato->modalidade }}</td>
						</tr>
						<tr>
							<td colspan="2"><strong>NOME DA INSTITUIÇÃO: </strong> {{ $candidato->instituicao }}</td>
							<td><strong>SEMESTRE/ANO (DA GRADUAÇÃO): </strong> {{ $candidato->semestre_ano_graduacao }}</td>
						</tr>
						<tr>
							<td colspan="2"><strong>CIDADE: </strong> {{ $candidato->cidade_graduacao }}</td>
							<td><strong>UF: </strong> {{ $candidato->uf_graduacao }}</td>
						</tr>
						<tr>
							<td><strong>NECESSIDADES ESPECIAIS: </strong> {{ $candidato->necessidades_especiais }}</td>
							<td colspan="2"><strong>QUAL?: </strong> {{ $candidato->nome_necessidade_especial }}</td>
						</tr>
						<tr>
							<td><strong>LINHA DE PESQUISA: </strong> {{ $linha_pesquisa->nome }}</td>
							<td colspan="2"><strong>POSSÍVEIS ORIENTADORES:</strong> {{ $candidato->possiveis_orientadores  }}</td>
						</tr>
					</table>
				</div>
            </div>
		</div>
    </body>
</html>
