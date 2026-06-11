@extends('layouts.index')

@section('title', 'Eventos')
@section('content')
    <div class="card shadow-sm">
        <div class="card-hearder bg-primary text-white d-flex justify-content-between align-item-center">
            <h5 class="mb-0">Eventos Cadastrados</h5>
        </div>
        <a href="{{ route('evento.create') }}" class="btn btn-light btn-sm fw-bold">
            + Novo
        </a>
        <div class="card-body">
            <table class="table table-hover table-striped mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Localização</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($eventos as $evento)
                        <tr>
                            <td class="fw-bold">{{ $evento->nome }}</td>
                            <td>{{ $evento->local }}</td>
                            <td>{{ $evento->data }}</td>
                            <td>{{ $evento->status }}</td>
                            <td>
                                <a href="{{ route('evento.show', $evento->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                <a href="{{route('evento.edit', $evento->id)}}" class="btn btn-sm btn-warning">Editar</a>
                                <button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Excluir evento?')">Excluir</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
