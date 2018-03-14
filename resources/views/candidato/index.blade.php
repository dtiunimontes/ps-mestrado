@extends('layouts.app')
@section('title', 'Área do candidato')
@section('content')
    <div class="col-md-12">
        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green bold uppercase">MESTRADO PROFISSIONAL EM DESENVOLVIMENTO ECONÔMICO E ESTRATÉGIA EMPRESARIAL</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="mt-element-step">
                    <div class="row step-background">
                        <div class="mt-step-desc">
                        <div class="col-md-4 col-md-offset-4 bg-grey-steel mt-step-col active">
                            <a href="{{ route('candidato.inscricao.gerar.ficha') }}" class="ancora">
                                <div class="mt-step-title uppercase font-grey-cascade"><strong>Ficha de inscrição</strong></div>
                                <div class="mt-step-content font-grey-cascade"><strong>Imprimir</strong> ficha de inscrição</div>
                            </a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
