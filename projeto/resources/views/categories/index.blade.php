@extends('app')
@section('title', 'Lista de categorias')
@section('content')
<h1>Lista de categorias</h1>
<div class="mb-4 mt-4">
    <a class="btn btn-primary" href="{{ route('categories.create') }}">Nova Categoria</a>
    <a class="btn btn-primary" href="{{ route('tasks.index') }}">Ver tarefas</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th> 
        </tr>
    </thead>
    <tbody>

        @foreach($categories as $categorie)
        <tr>
            <td>{{ $categorie->id }}</td>
            <td>

                {{ $categorie->title ?? $categorie->name }}
            </td>
            <td>

                <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $categorie) }}">
                    Atualizar
                </a>

                <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                    @csrf
                    @method('DELETE')
                    <button
                        class="btn btn-danger btn-sm"
                        type="submit">
                        Apagar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection