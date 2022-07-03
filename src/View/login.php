<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<h2>LOGIN</h2>
	<br>
	<br>
	<?php if (isset($data['errors'])): ?>
		<div style="color: red;">
			<?= $data['errors']; ?>
		</div>

	<?php endif ?>
	<br>
	<form action="login" method="post">
		<table>
			<tr>
				<td><label for="userName">username</label></td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td><label for="password">password</label></td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Login"></td>
				<td><a href="signin">Sign Up</a></td>
			</tr>
		</table>
	</form>
</body>
</html>