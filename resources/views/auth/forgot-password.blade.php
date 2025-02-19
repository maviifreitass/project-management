@extends('layouts.guest')

@section('title', 'Esqueci a Senha')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->

                    <div class="row justify-content-center">
                        <div class="p-5">
                            <div class="text-center">
                                <img src="http://127.0.0.1:8000/assets/img/logo.png" alt="Logo" class="mb-4"
                                    style="max-width: 180px;">

                                <h1 class="h4 text-gray-900 mb-4">Esqueceu sua senha?</h1>
                                <p>Insira seu endereço de e-mail para redefinir sua senha.</p>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" placeholder="Email"
                                        required autocomplete="username">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Nova Senha" required
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-user"
                                        id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha"
                                        required autocomplete="new-password">
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-user btn-block"
                                        style="background-color: var(--blue);">
                                        {{ __('Confirmar Redefinição de Senha') }}
                                    </button>
                                </div>
                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="btn btn-link small" href="{{ route('login') }}">
                                    Lembrou da sua senha? Faça o login!
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection
