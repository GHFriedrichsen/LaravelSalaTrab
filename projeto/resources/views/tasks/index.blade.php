@extends('app')
@section('title', 'Lista de tarefas')
@section('content')

<h1>Lista de tarefas</h1>
<div class="mb-4 mt-4">
    <a class="btn btn-primary" href="{{ route('tasks.create') }}">Nova Tarefa</a>
    <a class="btn btn-primary" href="{{ route('categories.index') }}">Gerenciar categorias</a>
</div>
<div class="row">
    @foreach ($tasks as $task)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">

                    <div class="row align-items-center mb-3">
                        <div class="col-8">
                            <h5 class="card-title mb-0">
                                {{ $task->name }}
                                
                                @isset($task->category->title)
                                    <small class="text-muted d-block mt-1">
                                        Categoria: <strong>{{ $task->category->title }}</strong>
                                    </small>
                                @endisset
                            </h5>
                        </div>
                        <div class="col-4 text-end">

                            <div class="d-flex justify-content-end gap-2 mb-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm" title="Editar Tarefa">
                                    <i class="bi bi-pencil-fill"></i> Editar
                                </a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar esta tarefa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Apagar Tarefa">
                                        <i class="bi bi-trash-fill"></i> Apagar
                                    </button>
                                </form>
                            </div>

                            @switch($task->done)
                            @case(1)
                            <span class="badge bg-success">Feito</span>
                            @break

                            @case(2)
                            <span class="badge bg-danger">Não Feito</span>
                            @break

                            @default
                            <span class="badge bg-warning">Pendente</span>
                            @endswitch
                        </div>
                    </div>

                    <div class="row flex-grow-1">
                        <div class="col-md-6">
                            <p class="card-text">
                                {{ $task->description }}
                            </p>
                        </div>

                        <div class="col-md-6 d-flex flex-column justify-content-end align-items-end">
                            <div class="d-flex gap-2">

                                {{-- NOVO: FORMULÁRIO DO BOTÃO "FEITO" (Atualiza done para 1) --}}
                                <form action="{{ route('tasks.mark-done', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm 
                                        {{ $task->done === 1 ? 'btn-secondary disabled' : 'btn-success' }}"
                                        {{ $task->done === 1 ? 'disabled' : '' }}>
                                        Feito
                                    </button>
                                </form>

                                {{-- NOVO: FORMULÁRIO DO BOTÃO "NÃO FEITO" (Atualiza done para 2) --}}
                                <form action="{{ route('tasks.mark-undone', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm 
                                        {{ $task->done === 2 ? 'btn-secondary disabled' : 'btn-danger' }}"
                                        {{ $task->done === 2 ? 'disabled' : '' }}>
                                        Não Feito
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
