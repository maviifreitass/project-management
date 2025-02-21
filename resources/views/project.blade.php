@extends('layouts.user_type.auth')

@section('content')

    <div>
    @include('layouts.project')

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">
                        {{ isset($project) ? 'Editar Projeto' : 'Crie um Novo Projeto' }}
                    </h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ isset($project) ? route('project.update', $project->id) : route('project.store') }}" 
                          method="POST" role="form text-left">
                        @csrf
                        @if(isset($project))
                            @method('PUT')
                        @endif
                        
                        @if($errors->any())
                            <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text text-white">
                                    {{ $errors->first() }}
                                </span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        
                        @if(session('success'))
                            <div class="m-3 alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                                <span class="alert-text text-white">
                                    {{ session('success') }}
                                </span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project-name" class="form-control-label">Nome</label>
                                    <div class="@error('name') border border-danger rounded-3 @enderror">
                                        <input class="form-control" 
                                               value="{{ isset($project) ? $project->name : old('name') }}" 
                                               type="text" placeholder="Nome do Projeto" id="name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <div class="@error('description') border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="description" rows="3"
                                          placeholder="Por favor, descreva seu projeto" name="description">{{ isset($project) ? $project->description : old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">
                                {{ isset($project) ? 'ATUALIZAR' : 'SALVAR' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
