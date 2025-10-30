@extends('app')
@section('title', 'Novo Cliente')
@section('content')
<h1>Novo Cliente</h1>
<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" id="nome" class="form-control" name="nome" placeholder="digite o seu nome">
    </div>

    <div class="mb-3">
        <label for="endereco" class="form-label">Endereço</label>
        <input type="text" id="endereco" class="form-control" name="endereco" placeholder="digite o seu endereço">
    </div>

    <div class="mb-3">
        <label for="observacao" class="form-label">Observação</label>
        <textarea name="observacao" id="observacao" class="form-control" placeholder="digite a observação"></textarea>
    </div>

    <button class="btn btn-success" type="submit">Enviar</button>
</form>
@endsection
