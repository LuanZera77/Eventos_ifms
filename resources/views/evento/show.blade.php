@extends('layouts.index')

@section('title', 'detalhes')

@section('content')

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
                        <li class="list-group-item px-0"><strong>📍 Local:</strong> {{ $evento->local }}</li>
                        <li class="list-group-item px-0"><strong>📅 Data:</strong>
                            {{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y') }}</li>
                    </ul>

                    @if ($evento->status === 'aberto')
                        <button type="button" class="btn btn-success btn-lg w-100 fw-bold mb-2" data-bs-toggle="modal"
                            data-bs-target="#modalInscricao">
                            Realizar Inscrição
                        </button>
                    @else
                        <button type="button" class="btn btn-secondary btn-lg w-100 fw-bold mb-2" disabled>
                            Inscrições Bloqueadas
                        </button>
                    @endif

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

    <div class="modal fade" id="modalInscricao" tabindex="-1" aria-labelledby="modalInscricaoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalInscricaoLabel">📝 Inscrição Rápida</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                {{-- {{ route('inscricoes.store') }} --}}
                <form action="" method="POST">
                    @csrf

                    <input type="hidden" name="evento_id" value="{{ $evento->id }}">

                    <div class="modal-body p-4">
                        <p class="text-muted">Você está se inscrevendo no evento:<br><strong
                                class="text-dark">{{ $evento->nome }}</strong></p>

                        <div class="mb-3">
                            <label for="cpf" class="form-label fw-bold">Informe o seu CPF:</label>
                            <input type="text" class="form-control form-control-lg" id="cpf" name="cpf"
                                placeholder="000.000.000-00" required>
                            <div class="form-text">Digite apenas os números ou com pontos e hífen.</div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success fw-bold px-4">Confirmar Inscrição</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
