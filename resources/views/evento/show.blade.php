@extends('layouts.index')

@section('title', 'detalhes')

@section('content')
    @include('components.msgs')

    <div class="row g-4">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    @if ($evento->status === 'aberto')
                        <span class="badge bg-success mb-2">Aberto</span>
                    @else
                        <span class="badge bg-danger mb-2">{{ ucfirst($evento->status) }}</span>
                    @endif

                    <h3 class="card-title text-primary fw-bold">{{ $evento->nome }}</h3>
                    <p class="text-muted mb-4">Informações gerais sobre o agendamento no sistema.</p>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item px-0"><strong>Local:</strong> {{ $evento->local }}</li>
                        <li class="list-group-item px-0"><strong>Data:</strong>
                            {{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y') }}</li>
                    </ul>
                    
                    <a href="{{ route('evento.index') }}" class="btn btn-outline-secondary w-100">Voltar para a Lista</a>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            {{-- @include('partials.mensagens') --}}

            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Participantes Inscritos ({{ $inscricoes->count() }})</h5>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($inscricoes as $inscricao)
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <h6 class="mb-0 fw-bold">{{ $inscricao->usuario->nome }}</h6>
                                <small class="text-muted">CPF: {{ $inscricao->usuario->cpf }} | E-mail:
                                    {{ $inscricao->usuario->email }}</small>
                            </div>
                            <span class="badge bg-secondary rounded-pill">{{ ucfirst($inscricao->usuario->tipo) }}</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted text-center py-4">
                            Nenhum participante inscrito até o momento.
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
