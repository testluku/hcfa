<!DOCTYPE html>
<html lang="ES">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hola {{ $firstname }} , </h2>
		<p> Gracias por registrarse </p>
		<p> A continuación la información de la cuenta </p>
		<p>
			Email : {{ $email }} <br />
			Contraseña : {{ $password }}<br />
		</p>
		<p> Por favor acceda a la siguiente dirección  <a href="{{ URL::to('user/activation?code='.$code) }}"> Activa mi cuenta ahora</a></p>
		<p> Si el enlace no funciona, copiar y pegar siguiente enlace </p>
		<p> {{ URL::to('user/activation?code='.$code) }} </p> 
		<br /><br /><p> Gracias </p><br /><br />
		
		{{ CNF_APPNAME }} 
	</body>
</html>