<html lang="pt">

<head>
    <title>Login</title>

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="tzond1YDLbdzTmoMPvQTOaCpHNuZ0G67ANXiaz4i">
    <title>Gestão de Projetos</title>

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="http://127.0.0.1:8000/assets/css/auth.css" rel="stylesheet">

</head>


<body class="bg-gradient-primary">

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

                                    <h1 class="h4 text-gray-900 mb-4">Novo aqui?</h1>
                                    <p>Realize seu cadastro</p>
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Name -->
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" placeholder="Nome" required
                                            autofocus autocomplete="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

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
                                            id="password" name="password" placeholder="Senha" required
                                            autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="password_confirmation" name="password_confirmation"
                                            placeholder="Confirme sua senha" required autocomplete="new-password">
                                    </div>

                                    <div class="flex items-center justify-end mt-4">

                                        <button type="submit" class="btn btn-primary btn-user btn-block"
                                            style="background-color: var(--blue);">
                                            {{ __('Cadastrar') }}
                                        </button>
                                    </div>
                                </form>


                                <hr>

                                <div class="text-center">
                                    <a class="btn btn-link small" href="http://127.0.0.1:8000/login">
                                        Já possui uma conta? Faça o login!
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