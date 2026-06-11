@extends('layouts.index')

@section('content')
    @include('components.msgs')
    <div class="row g-4">
        <div class="col-md-5 justify-content-center">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0 fw-bold">Informações do Usuário</h5>
                </div>
                <div class="card-body">
                    <h3 class="text-primary fw-bold mb-3">{{ $usuario->nome }}</h3>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item px-0"><strong>CPF:</strong> {{ $usuario->cpf }}</li>
                        <li class="list-group-item px-0"><strong>E-mail:</strong> {{ $usuario->email }}</li>
                        <li class="list-group-item px-0">
                            <strong>Tipo de Vínculo:</strong>
                            <span class="badge bg-secondary-subtle text-secondary fw-semibold">
                                {{ ucfirst($usuario->tipo) }}
                            </span>
                        </li>
                        <li class="list-group-item px-0"><strong>Cadastrado em:</strong>
                            {{ \Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y') }}</li>
                    </ul>

                    <div class="d-grid gap-2">
                        <a href="{{ route('usuario.index') }}" class="btn btn-outline-secondary">Voltar para a Lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
