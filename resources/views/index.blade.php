@extends('layouts.index')

@section('content')
    @include('components.msgs')

    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2 class="fw-bold text-dark mb-1">Painel Administrativo</h2>
            <p class="text-muted mb-0">Bem-vindo!</p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a href="{{ route('evento.index') }}" class="btn btn-primary btn-lg fw-bold shadow-sm">
                Gerenciar Eventos →
            </a>
        </div>
    </div>

    <div class="row g-3 mb-5">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white p-3 h-100">
                <small class="text-muted d-block fw-bold text-uppercase">Total Inscrições</small>
                <span class="fs-3 fw-bold text-success">{{ $inscricoes->count() }}</span>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white p-3 h-100">
                <small class="text-muted d-block fw-bold text-uppercase">Total de Eventos Disponíveis</small>
                <span class="fs-3 fw-bold text-primary">{{ $eventos->count() }}</span>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-dark text-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">👥 Últimas Inscrições Realizadas</h5>
            <button type="button" class="btn btn-success btn-sm fw-bold" data-bs-toggle="modal"
                data-bs-target="#modalNovaInscricao">
                + Nova Inscrição
            </button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Participante</th>
                            <th>CPF</th>
                            <th>Evento</th>
                            <th>Data da Inscrição</th>
                            <th class="text-center pe-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscricoes as $inscricao)
                            <tr>
                                <td class="ps-4">
                                    <span class="d-block fw-bold text-dark">{{ $inscricao->usuario->nome }}</span>
                                    <small class="text-muted">{{ $inscricao->usuario->email }}</small>
                                </td>
                                <td>{{ $inscricao->usuario->cpf }}</td>
                                <td><span
                                        class="badge bg-primary-subtle text-primary fw-semibold">{{ $inscricao->evento->nome }}</span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($inscricao->created_at)->format('d/m/Y H:i') }}</td>
                                <td class="text-center pe-4">
                                    <form action="{{ route('inscricoes.destroy', $inscricao->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Cancelar esta inscrição?')">
                                            Cancelar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalNovaInscricao" tabindex="-1" aria-labelledby="modalNovaInscricaoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title id="modalNovaInscricaoLabel">📝 Registrar Nova Inscrição</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action="{{ route('inscricoes.store') }}" method="POST">
                    @csrf

                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="cpf" class="form-label fw-bold">CPF do Participante:</label>
                            <input type="text" class="form-control form-control-lg" id="cpf" name="cpf"
                                placeholder="000.000.000-00" required>
                            <div class="form-text">O participante precisa estar previamente cadastrado no sistema.</div>
                        </div>

                        <div class="mb-2">
                            <label for="evento_id" class="form-label fw-bold">Selecione o Evento:</label>
                            <select class="form-select select-lg" id="evento_id" name="evento_id" required>
                                <option value="" disabled selected>Escolha um evento ativo...</option>
                                @foreach ($eventos as $evento)
                                    <option value="{{ $evento->id }}"
                                        {{ $evento->status !== 'aberto' ? 'disabled' : '' }}>
                                        {{ $evento->nome }} (Status: {{ ucfirst($evento->status) }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success fw-bold px-4">Confirmar Inscrição</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
