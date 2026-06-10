@extends('layouts.index')

@section('title', 'detalhes')

@section('content')
    <div class="row g-4">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <span class="badge bg-success mb-2">Aberto</span>
                    <h3 class="card-title text-primary fw-bold">II Semat - Semana da Matemática</h3>
                    <p class="text-muted mb-4">Informações gerais sobre o agendamento no sistema.</p>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0"><strong>📍 Local:</strong> Campus Corumbá - Auditório</li>
                        <li class="list-group-item px-0"><strong>📅 Data do Evento:</strong> 15 de Outubro de 2026</li>
                        <li class="list-group-item px-0"><strong>⏰ Criado em:</strong> 04/06/2026 às 14:00</li>
                    </ul>

                    <div class="mt-4">
                        <a href="{{ route('evento.index') }}" class="btn btn-outline-secondary w-100">Voltar para a
                            Lista</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">👥 Participantes Inscritos neste Evento</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div>
                            <h6 class="mb-0 fw-bold">Carlos Eduardo Silva</h6>
                            <small class="text-muted">E-mail: carlos.eduardo@ifms.edu.br</small>
                        </div>
                        <span class="badge bg-secondary rounded-pill">Estudante</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
