@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>{{ __('Logado no sistema!') }}</p>

                        <a href="{{ route('produtos.index') }}" class="btn btn-primary">{{ __('Produtos') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
