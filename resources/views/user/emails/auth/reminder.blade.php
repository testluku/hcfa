<!DOCTYPE html>
<html lang="ES">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Restaurar Contraseña</h2>

		<div>
			Para restablecer su contraseña, rellene este formulario: {{ URL::to('user/reset', array($token)) }}.
		</div>
	</body>
</html>