<!DOCTYPE html>

<html lang="pt-br">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title / Icon -->
        <title>AGR - Documentos Create</title>
        <link rel="icon" href="https://static.wixstatic.com/media/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png/v1/fill/w_192%2Ch_192%2Clg_1%2Cusm_0.66_1.00_0.01/5ae144_53127bc69c144f988ff9b7d420e65508%7Emv2.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/frameworks/materialize/css/materialize.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">
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
            <div class="col s12 m10 l10 offset-l2 offset-m1">
                <div class="carta">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Cadastro de novo Documento</span>
                        </div>
                        <hr>
                        <div class="card-image waves-effect waves-block waves-light">
                            <form action="{{ route('document.store', $documentos->id) }}" method="post">
                                @csrf
                                <!-- description -->
                                <div class="input-field col s6">
                                    <input name="description" type="text" id="description" class="validate @error('description') is-invalid @enderror">
                                    <label for="description">Descrição</label>

                                    @error('description')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- supplier -->
                                <div class="input-field col s6">
                                    <input name="supplier" id="supplier" type="text" class="validate @error('supplier') is-invalid @enderror">
                                    <label for="supplier">Fornecedor</label>

                                    @error('supplier')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- supplier_number -->
                                <div class="input-field col s6">
                                    <input name="supplier_number" id="supplier_number" type="text" class="validate @error('supplier_number') is-invalid @enderror">
                                    <label for="supplier_number">Código fornecedor</label>

                                    @error('supplier_number')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- original_number -->
                                <div class="input-field col s6">
                                    <input name="original_number" id="original_number" type="text" class="validate @error('original_number') is-invalid @enderror">
                                    <label for="original_number">Código original</label>

                                    @error('original_number')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- autolinea_number -->
                                <div class="input-field col s6">
                                    <input name="autolinea_number" id="autolinea_number" type="text" class="validate @error('autolinea_number') is-invalid @enderror">
                                    <label for="autolinea_number">Código Autolinea</label>

                                    @error('autolinea_number')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <!-- height_of_cylinder_head -->
                                <div class="input-field col s6">
                                    <input name="height_of_cylinder_head" id="height_of_cylinder_head" type="text" class="validate @error('height_of_cylinder_head') is-invalid @enderror">
                                    <label for="height_of_cylinder_head">Altura do cabeçote (face inferior à face superior)</label>

                                    @error('height_of_cylinder_head')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- parallelism_between_top_and_bottom_face -->
                                <div class="input-field col s6">
                                    <input name="parallelism_between_top_and_bottom_face" id="parallelism_between_top_and_bottom_face" type="text" class="validate @error('parallelism_between_top_and_bottom_face') is-invalid @enderror">
                                    <label for="parallelism_between_top_and_bottom_face">Desvio máximo do paralelismo face superior a face inferior</label>

                                    @error('parallelism_between_top_and_bottom_face')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- flatness_of_the_fire_face_logitudinal -->
                                <div class="input-field col s6">
                                    <input name="flatness_of_the_fire_face_logitudinal" id="flatness_of_the_fire_face_logitudinal" type="text" class="validate @error('flatness_of_the_fire_face_logitudinal') is-invalid @enderror">
                                    <label for="flatness_of_the_fire_face_logitudinal">Planicidade da face inferior do cabeçote (longitudinal)</label>

                                    @error('flatness_of_the_fire_face_logitudinal')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- flatness_of_the_fire_face_150mm -->
                                <div class="input-field col s6">
                                    <input name="flatness_of_the_fire_face_150mm" id="flatness_of_the_fire_face_150mm" type="text" class="validate @error('flatness_of_the_fire_face_150mm') is-invalid @enderror">
                                    <label for="flatness_of_the_fire_face_150mm">Planicidade da face inferior do cabeçote /150mm</label>

                                    @error('flatness_of_the_fire_face_150mm')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- roughness_of_the_fire_face	 -->
                                <div class="input-field col s6">
                                    <input name="roughness_of_the_fire_face" id="roughness_of_the_fire_face" type="text" class="validate @error('roughness_of_the_fire_face') is-invalid @enderror">
                                    <label for="roughness_of_the_fire_face">Rugosidade da face inferior do cabeçote (Rz)</label>

                                    @error('roughness_of_the_fire_face')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- height_of_the_intake_valve_to_cylinder_head_face -->
                                <div class="input-field col s6">
                                    <input name="height_of_the_intake_valve_to_cylinder_head_face" id="height_of_the_intake_valve_to_cylinder_head_face" type="text" class="validate @error('height_of_the_intake_valve_to_cylinder_head_face') is-invalid @enderror">
                                    <label for="height_of_the_intake_valve_to_cylinder_head_face">Altura da válvula de Admissão à face do cabeçote</label>

                                    @error('height_of_the_intake_valve_to_cylinder_head_face')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- height_of_the_exhaust_valve_to_cylinder_head_face -->
                                <div class="input-field col s6">
                                    <input name="height_of_the_exhaust_valve_to_cylinder_head_face" id="height_of_the_exhaust_valve_to_cylinder_head_face" type="text" class="validate @error('height_of_the_exhaust_valve_to_cylinder_head_face') is-invalid @enderror">
                                    <label for="height_of_the_exhaust_valve_to_cylinder_head_face">Altura da válvula de Escape à face do cabeçote</label>

                                    @error('height_of_the_exhaust_valve_to_cylinder_head_face')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- angle_of_the_intake_seat -->
                                <div class="input-field col s6">
                                    <input name="angle_of_the_intake_seat" id="angle_of_the_intake_seat" type="text" class="validate @error('angle_of_the_intake_seat') is-invalid @enderror">
                                    <label for="angle_of_the_intake_seat">Ângulo de assentamento da válvula na sede de Admissão</label>

                                    @error('angle_of_the_intake_seat')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- angle_of_the_exhaust_seat -->
                                <div class="input-field col s6">
                                    <input name="angle_of_the_exhaust_seat" id="angle_of_the_exhaust_seat" type="text" class="validate @error('angle_of_the_exhaust_seat') is-invalid @enderror">
                                    <label for="angle_of_the_exhaust_seat">Ângulo de assentamento da válvula na sede de Escape</label>

                                    @error('angle_of_the_exhaust_seat')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- intake_valve_guides_height -->
                                <div class="input-field col s6">
                                    <input name="intake_valve_guides_height" id="intake_valve_guides_height" type="text" class="validate @error('intake_valve_guides_height') is-invalid @enderror">
                                    <label for="intake_valve_guides_height">Altura das Guias de Valvulas Admissão</label>

                                    @error('intake_valve_guides_height')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- exhaust_valve_guides_height -->
                                <div class="input-field col s6">
                                    <input name="exhaust_valve_guides_height" id="exhaust_valve_guides_height" type="text" class="validate @error('exhaust_valve_guides_height') is-invalid @enderror">
                                    <label for="exhaust_valve_guides_height">Altura das Guias de Valvulas  Escape</label>

                                    @error('exhaust_valve_guides_height')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- width_of_the_intake_valve_seat -->
                                <div class="input-field col s6">
                                    <input name="width_of_the_intake_valve_seat" id="width_of_the_intake_valve_seat" type="text" class="validate @error('width_of_the_intake_valve_seat') is-invalid @enderror">
                                    <label for="width_of_the_intake_valve_seat">Largura do assento de Vávula de Admissão</label>

                                    @error('width_of_the_intake_valve_seat')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- width_of_the_exhaust_valve_seat -->
                                <div class="input-field col s6">
                                    <input name="width_of_the_exhaust_valve_seat" id="width_of_the_exhaust_valve_seat" type="text" class="validate @error('width_of_the_exhaust_valve_seat') is-invalid @enderror">
                                    <label for="width_of_the_exhaust_valve_seat">Largura do assento de válvula escape</label>

                                    @error('width_of_the_exhaust_valve_seat')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- distance_between_intake_surface_and_exhaust_surface -->
                                <div class="input-field col s6">
                                    <input name="distance_between_intake_surface_and_exhaust_surface" id="distance_between_intake_surface_and_exhaust_surface" type="text" class="validate @error('distance_between_intake_surface_and_exhaust_surface') is-invalid @enderror">
                                    <label for="distance_between_intake_surface_and_exhaust_surface">Distância Entre Face de Admissão e Face de Escape</label>

                                    @error('distance_between_intake_surface_and_exhaust_surface')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- diameter_of_the_camshaft_housing -->
                                <div class="input-field col s6">
                                    <input name="diameter_of_the_camshaft_housing" id="diameter_of_the_camshaft_housing" type="text" class="validate @error('diameter_of_the_camshaft_housing') is-invalid @enderror">
                                    <label for="diameter_of_the_camshaft_housing">Diâmetro do  alojamento do eixo comando</label>

                                    @error('diameter_of_the_camshaft_housing')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- leak_test -->
                                <div class="input-field col s6">
                                    <select name="leak_test" id="leak_test" class="validate @error('leak_test') is-invalid @enderror">
                                        <option value="" disabled selected>Teste de estanquiedade</option>
                                        <option value="OK">OK</option>
                                        <option value="NA">NA</option>
                                    </select>

                                    @error('leak_test')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <!-- vacuum_test -->
                                <div class="input-field col s6">
                                    <select name="vacuum_test" id="vacuum_test" class="validate @error('vacuum_test') is-invalid @enderror">
                                        <option value="" disabled selected>Teste de Vácuo</option>
                                        <option value="OK">OK</option>
                                        <option value="NA">NA</option>
                                    </select>

                                    @error('vacuum_test')
                                        <div class="red-text">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <button id="cadastrar" class="btn waves-effect waves-light blue-grey darken-3" type="submit">
                                    Cadastrar
                                    <i class="material-icons right">send</i>
                                </button>
                            </form>
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

        <!-- scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/frameworks/materialize/js/materialize.js') }}"></script>
        <script src="{{ asset('assets/js/teste.js') }}"></script>
    </body>
</html>