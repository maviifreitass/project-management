@extends('layouts.user_type.auth')

@section('content')

    <div>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Metas</h4>
                            <a href="{{ route('goals.create') }}" class="btn btn-primary">Adicionar Nova Meta</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Meta</th>
                                        <th>Descrição</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($goals as $goal)
                                        <tr>
                                            <td>{{ $goal->name }}</td>
                                            <td>{{ $goal->description }}</td>
                                            <td>
                                                @if($goal->status == 'completed')
                                                    <span class="badge bg-success">Concluída</span>
                                                @else
                                                    <span class="badge bg-warning">Em Progresso</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('goals.edit', $goal->id) }}"
                                                    class="btn btn-info btn-sm">Editar</a>
                                                <form action="{{ route('goals.destroy', $goal->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection