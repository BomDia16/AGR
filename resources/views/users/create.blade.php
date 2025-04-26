<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title / Icon -->
        <title>AGR - Create-User</title>
        <link rel="icon" href="https://static.wixstatic.com/media/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png/v1/fill/w_192%2Ch_192%2Clg_1%2Cusm_0.66_1.00_0.01/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/frameworks/materialize/css/materialize.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">
    </head>

    <body class="antialiased">
        <a href="{{ route('admin.index') }}">Voltar</a>
        <div class="grey lighten-2 login container">
            <img class="logo-login" src="https://static.wixstatic.com/media/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png/v1/fill/w_192%2Ch_192%2Clg_1%2Cusm_0.66_1.00_0.01/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png">
            <h3>Registrar</h3>
            <!-- Form -->
            <div class="row">
                @if (session('success'))
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert-error">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('user.store') }}" class="col s12">
                    @csrf

                    <!-- Name -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nome</label>

                            @error('name')
                                <div class="red-text">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="text" class="validate">
                            <label for="email">Email</label>

                            @error('email')
                                <div class="red-text">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Senha -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" name="password" type="password" class="validate">
                            <label for="password">Senha</label>

                            @error('password')
                                <div class="red-text">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s2"></div>
                        <div class="col s7">
                            <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Registrar</button>
                        </div>
                        <div class="col s2"></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/frameworks/materialize/js/materialize.js') }}"></script>
        <script src="{{ asset('assets/js/teste.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    </body>
</html>