@extends('layouts.index')

@section('content')

    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2 class="fw-bold text-dark mb-1">Controle de Usuários</h2>
            <p class="text-muted mb-0">Listagem geral de participantes cadastrados no sistema.</p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a href="{{ route('usuario.create') }}" class="btn btn-primary btn-lg fw-bold shadow-sm">
                Novo Usuário
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-dark text-white py-3">
            <h5 class="mb-0 fw-bold">Participantes Cadastrados</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Nome</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                            <th class="text-center pe-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr>
                                <td class="ps-4 fw-bold text-dark">
                                    {{ $usuario->nome }}
                                </td>
                                <td>
                                    {{ $usuario->cpf }}
                                </td>
                                <td>
                                    {{ $usuario->email }}
                                </td>
                                <td>
                                    @if($usuario->tipo === 'estudante')
                                        <span class="badge bg-success-subtle text-success fw-semibold">Estudante</span>
                                    @elseif($usuario->tipo === 'servidor')
                                        <span class="badge bg-info-subtle text-info fw-semibold">Servidor</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary fw-semibold">{{ ucfirst($usuario->tipo) }}</span>
                                    @endif
                                </td>
                                <td class="text-center pe-4">
                                    <a href="{{ route('usuario.show', $usuario->id) }}" class="btn btn-sm btn-info text-white">
                                        Visualizar
                                    </a>

                                    <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-sm btn-warning text-white">
                                        Editar
                                    </a>

                                    <form action="{{ route('usuario.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Nenhum usuário cadastrado no sistema até o momento.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
