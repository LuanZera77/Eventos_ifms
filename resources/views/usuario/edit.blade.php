@extends('layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark py-3">
                    <h5 class="mb-0 fw-bold">Editar Usuário</h5>
                </div>
                <div class="card-body p-4">

                    @include('components.msgs')

                    <form action="{{ route('usuario.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nome" class="form-label fw-bold">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cpf" class="form-label fw-bold">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $usuario->cpf }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tipo" class="form-label fw-bold">Tipo de Vínculo</label>
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <option value="estudante" {{ $usuario->tipo === 'estudante' ? 'selected' : '' }}>Estudante</option>
                                    <option value="servidor" {{ $usuario->tipo === 'servidor' ? 'selected' : '' }}>Servidor</option>
                                    <option value="externo" {{ $usuario->tipo === 'externo' ? 'selected' : '' }}>Comunidade Externa</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Nova Senha (Opcional)</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Deixe em branco para manter a senha atual">
                            <div class="form-text">Preencha este campo apenas se desejar alterar a senha de acesso deste participante.</div>
                        </div>

                        <hr class="text-muted my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('usuario.index') }}" class="btn btn-outline-secondary">Cancelar Alterações</a>
                            <button type="submit" class="btn btn-warning px-4 text-dark fw-bold">Atualizar Usuário</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
