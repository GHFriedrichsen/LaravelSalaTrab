@extends('app')
@section('title', 'Nova tarefa')
@section('content')
<h1>Nova tarefas</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Titulo da tarefa</label>
        <input
            type="text"
            id="nome"
            class="form-control"
            name="name"
            placeholder="Digite sua tarefa aqui...">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição da tarefa:</label>
        <textarea
            name="description"
            id="description"
            class="form-control"
            placeholder="Descrição da sua tarefa aqui..."></textarea>
    </div>

    <div class="mb-3">
        <label for="categories_id" class="form-label">Categoria:</label>
        <select
            name="categories_id"
            id="categories_id"
            class="form-select"
            required>

            <option value="">Selecione uma categoria</option>


            @foreach ($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->title }}
            </option>
            @endforeach

        </select>
    </div>

    <button class="btn btn-success" type="submit">Salvar tarefa</button>
</form>
@endsection