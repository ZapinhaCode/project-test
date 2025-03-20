@extends('layouts.app')

@section('content')

    <form action="{{ route('produtos.store') }}" method="POST">
        <div class="container w-50 mx-auto">
            @csrf
            @include('produtos.form_produto')

            <div class="form-group">
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a class="btn btn-danger" role="button" href="{{ route('produtos.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
@endsection