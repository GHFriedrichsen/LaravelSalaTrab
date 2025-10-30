@extends('app')
@section('title', 'Editar tarefa')
@section('content')
<h1>Editar tarafa</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
        <input type="hidden" name="done" value="{{ $task->done }}">
    <div class="mb-3">
        <label for="name" class="form-label">Titulo</label>
        <input value="{{$task->name}}" type="text" id="name" class="form-control" name="name" placeholder="digite o novo titulo">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <input value="{{$task->description}}" type="text" id="description" class="form-control" name="description" placeholder="digite o sua nova descrição">
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
            <option
                value="{{ $category->id }}"
                {{ $category->id == $task->categories_id ? 'selected' : '' }}>

                {{ $category->title }}
            </option>
            @endforeach

        </select>
    </div>

    <button class="btn btn-success" type="submit">Enviar</button>
</form>
@endsection