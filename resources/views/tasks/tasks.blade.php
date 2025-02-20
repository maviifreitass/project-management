@extends('layouts.user_type.auth')

@section('content')

    <div>
        @include('layouts.task')
        
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Tarefas Cadastradas') }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                        alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs text-secondary mb-0">{{ $task->title }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ 'Descrição' }}</p>
                                            <p class="text-xs text-secondary mb-0">{{ $task->description }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ 'Usuário Responsável' }}</p>
                                            <p class="text-xs text-secondary mb-0">{{  $task->user->name }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ 'Projeto' }}</p>
                                            <p class="text-xs text-secondary mb-0">{{  $task->project->name }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $task->created_at->format('d/m/y') }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('tasks.index', ['id' => $task->id]) }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">
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
