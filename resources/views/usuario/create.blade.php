@extends('layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold">Cadastrar Novo Usuário</h5>
                </div>
                <div class="card-body p-4">
                   @include('components.msgs')
                    <form action="{{ route('usuario.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nome" class="form-label fw-bold">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                placeholder="Digite o nome completo" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cpf" class="form-label fw-bold">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf"
                                    placeholder="000.000.000-00" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tipo" class="form-label fw-bold">Tipo de Vínculo</label>
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <option value="" disabled selected>Selecione o tipo...</option>
                                    <option value="estudante">Estudante</option>
                                    <option value="servidor">Servidor</option>
                                    <option value="externo">Comunidade Externa</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="exemplo@ifms.edu.br" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Senha</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Digite uma senha segura" required>
                            <div class="form-text">A senha deve conter no mínimo 6 caracteres.</div>
                        </div>

                        <hr class="text-muted my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('usuario.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary px-4">Salvar Usuário</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
