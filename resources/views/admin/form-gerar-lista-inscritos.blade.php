@extends('layouts.app')
@section('title', 'Gerar Lista de Inscritos')
@section('content')

<h3 class="form-section">Selecione a linha de pesquisa</h3>

{{ Form::open(['url' => route('admin.submit.gerar-lista-inscritos'), 'method' => 'post']) }}
<div class="row">
    <div class="col-md-12">
        <select name="linha_pesquisa" id="linha_pesquisa" class="form-control">
            @foreach($linhasPesquisa as $row)
            <option value="{{ $row->id }}">{{ $row->nome }}</option>
            @endforeach
        </select>
    </div>
</div>
<br>
<div class="text-right">
    <button type="submit" id="btn_submit" class="btn bg-green-jungle bg-font-green-jungle">Gerar Lista</button>
</div>
{{ Form::close() }}

@endsection
