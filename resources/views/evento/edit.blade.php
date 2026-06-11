@extends('layouts.index')
@section('title', 'Edição')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-white py-3">
                    <h5 class="mb-0 text-dark">✏️ Editar Evento: {{ $evento->nome }}</h5>
                </div>
                <div class="card-body p-4">

                    {{-- @include('partials.mensagens') --}}

                    <form action="{{ route('evento.update', $evento->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nome" class="form-label fw-bold">Nome do Evento</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="{{ $evento->nome }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label for="local" class="form-label fw-bold">📍 Localização / Prédio</label>
                                <input type="text" class="form-control" id="local" name="local"
                                    value="{{ $evento->local }}" required>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="data" class="form-label fw-bold">📅 Data do Evento</label>
                                <input type="date" class="form-control" id="data" name="data"
                                    value="{{ $evento->data }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Status Atual do Evento</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="aberto" {{ $evento->status === 'aberto' ? 'selected' : '' }}>Aberto</option>
                                <option value="em_andamento" {{ $evento->status === 'em_andamento' ? 'selected' : '' }}>Em
                                    Andamento</option>
                                <option value="fechado" {{ $evento->status === 'fechado' ? 'selected' : '' }}>Fechado
                                </option>
                                <option value="encerrado" {{ $evento->status === 'encerrado' ? 'selected' : '' }}>Encerrado
                                </option>
                            </select>
                        </div>

                        <hr class="text-muted my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('evento.index') }}" class="btn btn-outline-secondary">Cancelar Alterações</a>
                            <button type="submit" class="btn btn-warning px-4 text-dark fw-bold">Atualizar Evento</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
