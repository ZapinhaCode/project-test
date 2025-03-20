@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <a href="{{ route('produtos.create') }}" class="btn btn-success">Adicionar Produto</a>
        </div>
    </div>

    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Produtos') }}</div>

                @if (session('success'))
                    <div class="alert alert-success text-center mt-2">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger text-center mt-2">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Preço</th>
                                <th class="text-center">Data de criação</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (isset($produtos) && !is_null($produtos))
                                @foreach ($produtos as $produto)
                                    <tr>
                                        <td class="text-center">{{ $produto->nome }}</td>
                                        <td class="text-center">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ $produto->created_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum produto encontrado</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
