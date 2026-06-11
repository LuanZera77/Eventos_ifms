@extends('layouts.index')
@section('title', 'Cadastro')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">Cadastrar Novo Evento</h5>
                </div>
                <div class="card-body p-4">

                    @include('components.msgs')

                    <form action="{{ route('evento.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nome" class="form-label fw-bold">Nome do Evento</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                placeholder="Ex: II Semat - Semana da Matemática" required>
                        </div>

                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label for="local" class="form-label fw-bold">Localização / Prédio</label>
                                <input type="text" class="form-control" id="local" name="local"
                                    placeholder="Ex: Campus Corumbá - Auditório" required>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="data" class="form-label fw-bold">Data do Evento</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Status Inicial</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="aberto" selected>Aberto</option>
                                <option value="fechado">Fechado</option>
                                <option value="em_andamento">Em Andamento...</option>
                                <option value="encerrado">Encerrado</option>
                            </select>
                        </div>

                        <hr class="text-muted my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('evento.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary px-4">Salvar Evento</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
