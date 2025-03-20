@extends('layouts.app')

@section('content')
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        <div class="container w-50 mx-auto">
            @csrf
            @method('PUT')
            @include('produtos.form_produto')

            <div class="form-group">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a class="btn btn-danger" role="button" href="{{ route('produtos.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
@endsection