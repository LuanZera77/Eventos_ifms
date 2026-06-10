@extends('layouts.index')

@section('content')
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2 class="fw-bold text-dark mb-1">Painel Administrativo</h2>
            <p class="text-muted mb-0">Bem-vindo de volta! Controle de eventos e participantes.</p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a href="{{ route('evento.index') }}" class="btn btn-primary btn-lg fw-bold shadow-sm">
                📅 Gerenciar Eventos →
            </a>
        </div>
    </div>

    <div class="row g-3 mb-5">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white p-3 h-100">
                <small class="text-muted d-block fw-bold text-uppercase">Total Inscrições</small>
                <span class="fs-3 fw-bold text-success">42</span>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white p-3 h-100">
                <small class="text-muted d-block fw-bold text-uppercase">Eventos Ativos</small>
                <span class="fs-3 fw-bold text-primary">5</span>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-dark text-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">👥 Últimas Inscrições Realizadas</h5>
            <a href="{{ route('inscricoes.store') }}" class="btn btn-success btn-sm fw-bold">+ Nova Inscrição</a>
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
                        <tr>
                            <td class="ps-4">
                                <span class="d-block fw-bold text-dark">João Marcelo Spíndola</span>
                                <small class="text-muted">joao@ifms.edu.br</small>
                            </td>
                            <td>123.456.789-00</td>
                            <td><span class="badge bg-primary-subtle text-primary fw-semibold">II Semat</span></td>
                            <td>10/06/2026</td>
                            <td class="text-center pe-4">
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Cancelar esta inscrição?')">
                                        Cancelar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
