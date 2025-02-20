@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">
    <h2>Editar Membro</h2>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description">{{ $member->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('members') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
