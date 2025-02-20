@extends('layouts.user_type.auth')

@section('content')

    <div>
        @include('layouts.member')

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Membros Cadastrados') }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                        alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $member->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $member->description }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ 'Email' }}</p>
                                            <p class="text-xs text-secondary mb-0">{{ $member->email }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </td>
                                        <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ 'Data de criação' }}</p>
                                            <span
                                                class="text-xs text-secondary mb-0">{{ $member->created_at->format('d/m/y') }}</span>
                                        </td>
                                        <td class="align-middle">
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir este membro?');">
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