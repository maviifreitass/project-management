@extends('layouts.user_type.auth')

@section('content')

    <div>
        @include('layouts.project')

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Projetos Cadastrados') }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $project->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $project->description }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $project->created_at->format('d/m/y') }}</span>
                                        </td>
                                        <td class="align-middle">
                                        <td class="align-middle">
                                            <a href="{{ route('tasks.index', ['id' => $project->id]) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                        </td>
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('project.destroy', $project->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir este projeto?');">
                                                    <i class="fas fa-trash-alt"></i> Deletar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection