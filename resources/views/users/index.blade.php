<!DOCTYPE html>

<html lang="pt-br">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title / Icon -->
        <title>AGR - Usuários</title>
        <link rel="icon" href="https://static.wixstatic.com/media/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png/v1/fill/w_192%2Ch_192%2Clg_1%2Cusm_0.66_1.00_0.01/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/frameworks/materialize/css/materialize.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">

        <style>
            body {font-family: Arial, Helvetica, sans-serif;}

            /* The Modal (background) */
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 200px; /* Location of the box */
            left: 0;
            top: 0;
            width: 80%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            }

            /* The Close Button */
            .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            }

            .close:hover,
            .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            }
        </style>
    </head>

    <body class="antialiased">
        <header>
            <!--Sidenav-->
			<ul id="sidenav" class="sidenav sidenav-fixed z-depth-0 light-blue darken-3 gradient-bottom">
				<a href="{{ route('welcome') }}" class="brand-logo">
					<li id="box-logo" style="margin-top:24px;margin-bottom:24px;" class="white-text">
						<img id="logo" class="responsive-img" src="https://static.wixstatic.com/media/5ae144_f229cc874d574e5c8755f59ff854d303~mv2.png/v1/fill/w_420,h_118,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/AUTOLINEA%20.png" />
					</li>
                </a>
                <hr>
                <li>
					<a href="{{ route('admin.index') }}" class="white-text">
						<i class="material-icons">assignment_ind</i>
						Admins
					</a>
                    <a href="{{ route('document.index') }}" class="white-text">
						<i class="material-icons">description</i>
						Documentos
					</a>
                    <a href="{{ route('user.index') }}" class="white-text">
						<i class="material-icons">person</i>
						Usuários
					</a>
                    <a href="" class="white-text">
						<i class="material-icons">done</i>
						Requisições
					</a>
				</li>
			</ul>

			<!--Navbar-->
			<nav id="nav" class="z-depth-0 grey">
				<div class="nav-wrapper">
					<a href="#" data-target="sidenav" class="sidenav-trigger">
						<i class="material-icons">menu</i>
					</a>
					<ul class="right">
						<li id="minha-conta">
							<a id="button-dropdown-my-account" class="dropdown-trigger" href="javascript:void(0);" data-target="dropdown-my-account">
								<i class="material-icons large">account_circle</i>
							</a>
							<!-- Dropdown Minha Conta -->
							<ul id="dropdown-my-account" class="dropdown-content">
                                <li>
									<a class="black-text">
                                        <i class="material-icons">person</i>
                                        <!-- Nome da pessoa (Lembrar de colocar) -->
                                        {{ Auth::guard('admin')->user()->name }}
                                    </a>
								</li>
								<li>
									<a href="#" class="black-text">
										<i class="material-icons">settings</i>
										Minha Conta
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a class="dropdown-item black-text" href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="material-icons">power_settings_new</i>
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <!-- Lembrar de por o logout -->
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
        </header>

        <!-- Tabela -->
        <div class="row">
            <div class="col s12 m10 l8 offset-l2 offset-m1">
                <div class="carta">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Usuários</span>
                            <button id="btn-cadastrar" class="btn waves-effect waves-light blue-grey darken-3" name="action">
                                <a class="white-text" href="{{ route('user.create') }}">Create</a>
                                <i class="material-icons right">add</i>
                            </button>
                        </div>
                        <hr>

                        <div class="card-image waves-effect waves-block waves-light">
                            <table class="striped responsive-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <th>{{ $user->id }}</th>
                                        <th>{{ $user->name }}</th>
                                        <th>{{ $user->email }}</th>
                                        <th>
                                            <button class="btn waves-effect waves-light blue-grey darken-3">
                                                <a class="white-text" href="{{ route('user.edit', $user->id) }}">
                                                    <i class="small material-icons">edit</i>
                                                </a>
                                            </button>
                                            
                                        </th>
                                        <th>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn waves-effect waves-light blue-grey darken-3">
                                                    <i class="small material-icons">delete</i>
                                                </button>
                                            </form>
                                        </th>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $users->links('vendor.pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="page-footer grey">
            <div class="footer-copyright">
                <div class="container">
                © 2025 Todos os direitos reservados ao AGR
                </div>                
            </div>
        </footer>

        <!-- scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/frameworks/materialize/js/materialize.js') }}"></script>
        <script src="{{ asset('assets/js/teste.js') }}"></script>
    </body>
</html>