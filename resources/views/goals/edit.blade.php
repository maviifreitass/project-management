@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Meta</h4>
                        <a href="{{ route('goals.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>

                    <div class="card-body">
                        <!-- Formulário para Editar Meta -->
                        <form action="{{ route('goals.update', $goal->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nome da Meta</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $goal->name) }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" class="form-control" rows="4"
                                    required>{{ old('description', $goal->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="not_started" {{ old('status', $goal->status) == 'not_started' ? 'selected' : '' }}>Não Iniciada</option>
                                    <option value="in_progress" {{ old('status', $goal->status) == 'in_progress' ? 'selected' : '' }}>Em Progresso</option>
                                    <option value="completed" {{ old('status', $goal->status) == 'completed' ? 'selected' : '' }}>Concluída</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Atualizar Meta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection