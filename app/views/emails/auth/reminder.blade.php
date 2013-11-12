<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Восстановление пароля</h2>

		<div>
			Для восстановления пароля, перейдите по ссылке: {{ URL::route('password.reset', array($token, urlencode($email))) }}.
		</div>
	</body>
</html>