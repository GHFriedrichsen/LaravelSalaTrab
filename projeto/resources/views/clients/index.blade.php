@extends('app')
@section('title', 'Lista de Clients')
@section('content')
<h1>Lista de clientes</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
    </thead>  
    <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->nome }}</td>
                <td>{{ $client->endereco }}</td>
                <td>
                    <a href="{{ route('clients.show', $client) }}">
                        {{$client->nome}}
                    </a>
                    <br>
                    <a class="btn btn-primary" href="{{ route('clients.edit', $client) }}">
                        Atualizar
                    </a> <br>
                    
                    <form action="{{ route('clients.destroy', $client) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button 
                            class="btn btn-danger" 
                            type="subtmit" 
                            onclick="return confirm('Tem certeza que deseja excluir?')"
                        >
                            Apagar
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>  
</table>

<a class="btn btn-success" href="{{ route('clients.create') }}">Novo Cliente</a>
@endsection
