<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title / Icon -->
    <title>AGR - Documentos Edit</title>
    <link rel="icon" href="https://static.wixstatic.com/media/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png/v1/fill/w_192%2Ch_192%2Clg_1%2Cusm_0.66_1.00_0.01/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/frameworks/materialize/css/materialize.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 200px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 80%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
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

        <!-- Cabeçalho -->
        <div class="col s12 m10 l10 offset-l2 offset-m1">
            <div class="carta">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Editar parâmetros do Cabeçalho</span>
                    </div>
                    <hr>
                    @if (session('error'))
                        <div class="alert-error">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-image waves-effect waves-block waves-light">
                        <form action="{{ route('document.update', $documentos->id) }}" method="post">
                            @csrf
                            @method('put')

                            <input type="hidden" name="id" value="{{ $documentos->id }}">

                            <!-- description -->
                            <div class="input-field col s6">
                                <input value="{{ $documentos->description }}" name="description" type="text" id="description" class="validate @error('description') is-invalid @enderror">
                                <label for="description">Descrição</label>

                                @error('description')
                                <div class="red-text">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- supplier -->
                            <div class="input-field col s6">
                                <input value="{{ $documentos->supplier }}" name="supplier" id="supplier" type="text" class="validate @error('supplier') is-invalid @enderror">
                                <label for="supplier">Fornecedor</label>

                                @error('supplier')
                                <div class="red-text">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- supplier_number -->
                            <div class="input-field col s6">
                                <input value="{{ $documentos->supplier_number }}" name="supplier_number" id="supplier_number" type="text" class="validate @error('supplier_number') is-invalid @enderror">
                                <label for="supplier_number">Código fornecedor</label>

                                @error('supplier_number')
                                <div class="red-text">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- original_number -->
                            <div class="input-field col s6">
                                <input value="{{ $documentos->original_number }}" name="original_number" id="original_number" type="text" class="validate @error('original_number') is-invalid @enderror">
                                <label for="original_number">Código original</label>

                                @error('original_number')
                                <div class="red-text">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- autolinea_number -->
                            <div class="input-field col s6">
                                <input value="{{ $documentos->autolinea_number }}" name="autolinea_number" id="autolinea_number" type="text" class="validate @error('autolinea_number') is-invalid @enderror">
                                <label for="autolinea_number">Código Autolinea</label>

                                @error('autolinea_number')
                                <div class="red-text">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <button id="cadastrar" class="btn waves-effect waves-light blue-grey darken-3" type="submit">
                                Salvar
                                <i class="material-icons right">send</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Requisitos -->
        <div class="col s12 m10 l10 offset-l2 offset-m1">
            <div class="carta">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Editar Requisitos</span>
                        <button id="btn-cadastrar" class="btn waves-effect waves-light blue-grey darken-3" type="submit" name="action">
                            <a class="white-text">Create</a>
                            <i class="material-icons right">add</i>
                        </button>
                    </div>
                    <hr>
                    <div class="card-content waves-effect waves-block waves-light" style="height: 100%;">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Requisito</th>
                                    <th>Mínimo</th>
                                    <th>Máximo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requisitos as $requisito)
                                <tr>
                                    <th></th>
                                    <th>{{ $requisito->requirement_show }}</th>
                                    <th>{{ $requisito->min }}</th>
                                    <th>{{ $requisito->max }}</th>
                                    <th>
                                        <button class="btn waves-effect waves-light blue-grey darken-3">
                                            <a class="white-text" href="">
                                                <i class="small material-icons">edit</i>
                                            </a>
                                        </button>
                                    </th>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer grey fixarRodape">
        <div class="footer-copyright">
            <div class="container">
                © 2025 Todos os direitos reservados ao AGR
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div id="myModal" class="modal" style="max-height: 100%;">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="row">
                <span class="close">&times;</span>
                @if (session('error'))
                    <div class="alert-error">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('requirement.store') }}" method="post">
                    @csrf
                    <span class="card-title activator grey-text text-darken-4">Inserir novo requisito</span>

                    <!-- document id -->
                    <input type="hidden" name="document_id" value="{{ $documentos->id }}">

                    <!-- description -->
                    <div class="input-field col s12">
                        <select name="requirement" required id="requirement" class="validate @error('requirement') is-invalid @enderror">
                            <option value="" disabled selected>Selecione o requisito que deseja adicionar</option>
                            <option value="height_of_cylinder_head">Altura do cabeçote (face inferior à face superior)</option>
                            <option value="parallelism_between_top_and_bottom_face">Desvio máximo do paralelismo face superior a face inferior</option>
                            <option value="flatness_of_the_fire_face_logitudinal">Planicidade da face inferior do cabeçote (longitudinal)</option>
                            <option value="flatness_of_the_fire_face_150mm">Planicidade da face inferior do cabeçote /150mm</option>
                            <option value="roughness_of_the_fire_face">Rugosidade da face inferior do cabeçote (Rz)</option>
                            <option value="height_of_the_intake_valve_to_cylinder_head_face">Altura da válvula de Admissão à face do cabeçote</option>
                            <option value="height_of_the_exhaust_valve_to_cylinder_head_face">Altura da válvula de Escape à face do cabeçote</option>
                            <option value="angle_of_the_intake_seat">Ângulo de assentamento da válvula na sede de Admissão</option>
                            <option value="angle_of_the_exhaust_seat">Ângulo de assentamento da válvula na sede de Escape</option>
                            <option value="intake_valve_guides_height">Altura das Guias de Valvulas Admissão</option>
                            <option value="exhaust_valve_guides_height">Altura das Guias de Valvulas Escape</option>
                            <option value="width_of_the_intake_valve_seat">Largura do assento de Vávula de Admissão</option>
                            <option value="width_of_the_exhaust_valve_seat">Largura do assento de válvula escape</option>
                            <option value="distance_between_intake_surface_and_exhaust_surface">Distância Entre Face de Admissão e Face de Escape</option>
                            <option value="diameter_of_the_camshaft_housing">Diâmetro do alojamento do eixo comando</option>
                            <option value="leak_test">Teste de estanquiedade</option>
                            <option value="vacuum_test">Teste de Vácuo</option>
                        </select>

                        @error('requirement')
                        <div class="red-text">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <!-- min -->
                    <div class="input-field col s6" id="hideMin">
                        <input id="min" name="min" type="text" class="validate @error('min') is-invalid @enderror">
                        <label for="min">Mínimo</label>

                        @error('min')
                        <div class="red-text">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <!-- max -->
                    <div class="input-field col s6" id="hideMax">
                        <input id="max" name="max" type="text" class="validate @error('max') is-invalid @enderror">
                        <label for="max">Máximo</label>

                        @error('max')
                        <div class="red-text">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="input-field col s12">
                        <button id="cadastrar" class="btn waves-effect waves-light blue-grey darken-3" type="submit">
                            Cadastrar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/frameworks/materialize/js/materialize.js') }}"></script>
    <script src="{{ asset('assets/js/teste.js') }}"></script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("btn-cadastrar");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Select
        const select = document.getElementById('requirement');
        const max = document.getElementById('max');
        const min = document.getElementById('min');
        const hideMin = document.getElementById('hideMin')
        const hideMax = document.getElementById('hideMax')

        select.addEventListener("change", function() {
            if(select.value === "leak_test" || select.value === "vacuum_test") {
                hideMax.style.display = "none";
                max.value = "OK"
                hideMin.style.display = "none";
                min.value = "OK"
            } else {
                hideMax.style.display = "block";
                hideMin.style.display = "block";
                max.value = ""
                min.value = ""
            }
        })
    </script>
</body>

</html>