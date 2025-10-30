@extends('app')
@section('title', 'Editar categoria')
@section('content')
<h1>Editar categoria</h1>

{{-- CORREÇÃO 1: Mudar $categorie para $category no route() --}}
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="title" class="form-label">Nome da categoria</label>
        
        {{-- CORREÇÃO 2: Mudar $categorie->title para $category->title --}}
        <input value="{{ $category->title }}" 
               type="text" 
               id="title" 
               class="form-control" 
               name="title" 
               placeholder="digite o novo nome">
    </div>

    <button class="btn btn-success" type="submit">Enviar</button>
</form>
@endsection
