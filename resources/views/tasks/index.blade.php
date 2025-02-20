@extends('layouts.user_type.auth')

@section('content')

    <div>
        @include('layouts.task')

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ $editTask ? 'Editar Tarefa' : 'Crie uma Nova Tarefa' }}</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $editTask->id ?? '' }}">

                        @if ($errors->any())
                            <div class="mt-3 alert alert-primary alert-dismissible fade show">
                                <span class="alert-text text-white">{{ $errors->first() }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="m-3 alert alert-success alert-dismissible fade show">
                                <span class="alert-text text-white">{{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Nome da Tarefa</label>
                                    <input class="form-control" type="text" id="title" name="title"
                                        value="{{ old('title', $editTask->title ?? '') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_id">Projeto</label>
                                    <select id="project_id" name="project_id" class="form-control" required>
                                        <option value="">Selecione um projeto</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}" 
                                                {{ old('project_id', $editTask->project_id ?? '') == $project->id ? 'selected' : '' }}>
                                                {{ $project->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_id">Usuário Responsável</label>
                                    <select id="user_id" name="user_id" class="form-control" required>
                                        <option value="">Selecione um usuário</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" 
                                                {{ old('user_id', $editTask->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="due_date">Prazo</label>
                                    <input type="date" id="due_date" name="due_date" class="form-control"
                                        value="{{ old('due_date', $editTask->due_date ?? '') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $editTask->description ?? '') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">
                                {{ $editTask ? 'ATUALIZAR' : 'SALVAR' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
