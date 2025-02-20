<!-- forgot-password.blade.php -->
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Redefinir Senha</title>
    <link href="http://127.0.0.1:8000/assets/css/auth.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="http://127.0.0.1:8000/assets/img/logo.png" alt="Logo" class="mb-4" style="max-width: 180px;">
                                    <h1 class="h4 text-gray-900 mb-4">Redefinir Senha</h1>
                                    <p>Digite seu e-mail e a nova senha que deseja</p>
                                </div>

                                <!-- Exibindo mensagens de erro ou sucesso -->
                                @if(session('status'))
                                    <div class="alert alert-success mt-3" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger mt-3">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Formulário para redefinir a senha -->
                                <form method="POST" action="{{ route('forgot-password') }}">
                                    @csrf

                                    <!-- Campo de E-mail -->
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="username">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Nova Senha -->
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Nova Senha" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Confirmar Nova Senha -->
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua nova senha" required autocomplete="new-password">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color: var(--blue);">
                                        Redefinir Senha
                                    </button>
                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="btn btn-link small" href="{{ route('login') }}">
                                        Voltar para o login
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
