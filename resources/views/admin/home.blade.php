@extends('layouts.app')
@section('title', 'Administrador ')
@section('content')
<div class="col-md-12">
    <div class="portlet light portlet-fit ">
        <div class="portlet-body">
            <div class="mt-element-step">
                <div class="row step-background">
                    <div class="col-md-4 col-md-offset-2 bg-grey-steel mt-step-col active">
                        <div class="mt-step-title uppercase font-grey-cascade"><strong>{{ $numeroInscricoesDesenvolvimentoEconomico }} inscrições</strong></div>
                        <div class="mt-step-content font-grey-cascade">Desenvolvimento Econômico</div>
                    </div>
                    <div class="col-md-4 bg-grey-steel mt-step-col error">
                        <div class="mt-step-title uppercase font-grey-cascade"><strong>{{ $numeroInscricoesEstrategiaFinancasEmpresariais }} inscrições</strong></div>
                        <div class="mt-step-content font-grey-cascade">Estratégia e Finanças Empresariais</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
