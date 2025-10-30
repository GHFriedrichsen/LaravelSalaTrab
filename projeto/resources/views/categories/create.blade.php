@extends('app')
@section('title', 'Nova categoria')
@section('content')
<h1>Nova categoria</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Categoria Nova</label>
        <input type="text" id="title" class="form-control" name="title" placeholder="digite a sua categoria">
    </div>

    <button class="btn btn-success" type="submit">Salvar categoria</button>
</form>
@endsection
