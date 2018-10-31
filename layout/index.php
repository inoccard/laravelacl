<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login Dashboard - Curso ACL</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!--Fonts-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<!--CSS-->
	<link rel="stylesheet" href="./css/acl-painel.css">

	<!--Favicon-->
	<link rel="icon" type="image/png" href="./imgs/favicon-acl.png">
</head>
<body>
	<div class="login">
		<div class="login-header">
			<img src="./imgs/acl-branca.png" alt="acl" class="logo-login">
		</div>

		<form class="login form" >
			<div class="form-group">
				<input type="text" name="email" placeholder="Informe o seu e-mail" class="form-control">
			</div>
			<div class="form-group">
				<input type="password" name="password" placeholder="Informe a sua senha" class="form-control">
			</div>

			<div class="form-group">
				<a href="painel.php" class="btn btn-login">
					Entrar
				</a>
			</div>
			<div class="form-group text-right">
				<a href="recuperar.php" class="recuperar">
					Recuperar Senha?
				</a>
			</div>
		</form>
	</div>
</body>
</html>