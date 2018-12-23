<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>{{'Painel ACL'}}</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!--Fonts-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<!--CSS-->
	<link rel="stylesheet" href="{{url("assets/painel/css/acl-painel.css")}}">

	<!--Favicon-->
	<link rel="icon" type="image/png" href="{{url("assets/painel/imgs/favicon-acl.png")}}">
</head>
<body>
	<div class="menu">
		<ul class="menu col-md-12">
			<li class="col-md-2 text-center">
				<a href="/">
                    <img src="{{url("assets/painel/imgs/acl-branca.png")}}" alt="acl" class="logo-login">
		        </a>
			</li>
			@can('user')
			<li class="col-md-2 text-center">
				<a href="/painel/users">
					<!--<img src="{{url('assets/painel/imgs/perfil-acl.png')}}" alt="Meu Perfil" class="img-menu">-->
					<h1>Usuários</h1>
				</a>
			</li>
			@else
			<li class="col-md-2 text-center">
				<!--<img src="{{url('assets/painel/imgs/perfil-acl.png')}}" alt="Meu Perfil" class="img-menu">-->
				<h1>Usuários</h1>
			</li>
			@endcan

			@can('view_post')
			<li class="col-md-2 text-center">
				<a href="/painel/posts">
					<!--<img src="{{url('assets/painel/imgs/noticias-acl.png')}}" alt="Estilos" class="img-menu">-->
					<h1>Posts</h1>
				</a>
			</li>
			@else
			<li class="col-md-2 text-center">
				<!--<img src="{{url('assets/painel/imgs/noticias-acl.png')}}" alt="Estilos" class="img-menu">-->
				<h1>Posts</h1>
			</li>
			@endcan

			@can('adm')
			<li class="col-md-2 text-center">
				<a href="/painel/roles">
					<!--<img src="{{url('assets/painel/imgs/funcao-acl.png')}}" alt="Albuns" class="img-menu">-->
					<h1>Funções</h1>
				</a>
			</li>
			@else
			<li class="col-md-2 text-center">
				<!--<img src="{{url('assets/painel/imgs/funcao-acl.png')}}" alt="Albuns" class="img-menu">-->
				<h1>Funções</h1>
			</li>
			@endcan

			@can('adm')
			<li class="col-md-2 text-center">
				<a href="/painel/permissions">
					<!--<img src="{{url('assets/painel/imgs/permissao-acl.png')}}" alt="Musicas" class="img-menu">-->
					<h1>Permissões</h1>
				</a>
			</li>
			@else
			<li class="col-md-2 text-center">
				<!--<img src="{{url('assets/painel/imgs/permissao-acl.png')}}" alt="Musicas" class="img-menu">-->
				<h1>Permissões</h1>
			</li>
			@endcan

			<!-- Authentication Links -->
			@guest
			<li class="col-md-2 text-center">	
				<a class="nav-link" href="{{ route('login') }}">
				<!--<img src="{{url('assets/painel/imgs/sair-acl.png')}}" alt="Sair" class="img-menu">-->
					<h1>{{ __('Login') }}</h1>
				</a>
			</li>
			<li class="col-md-2 text-center">
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">
                   	<!--<img src="{{url('assets/painel/imgs/sair-acl.png')}}" alt="Sair" class="img-menu">-->
                      	<h1>{{ __('Cadastro') }}</h1>
                    </a>
                @endif
            </li>
                @else
	         <li class="col-md-2 text-center">
    	    	<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <h1>{{ Auth::user()->name }}<span class="caret"></span></h1>
        	    </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <h4>{{ __('Sair') }}</h4>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
		</ul>
	</div><!--Menu-->

	<div class="clear"></div>

	<!--Filters and actions
	<div class="actions">
		<div class="container">
			<a class="add" href="forms">
				<i class="fa fa-plus-circle"></i>
			</a>

			<form class="form-search form form-inline">
				<input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
				<input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success">
			</form>
		</div>
	</div> Actions-->

	<div class="clear"></div>

	<!--Content Dinâmico-->
	@yield('content')

	<div class="clear"></div>

	<div class="footer actions">
		<div class="container text-center">
			<p class="footer">IC LAB - Todos os direitos reservados</p>
		</div>
	</div>


	<!--jQuery-->
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>