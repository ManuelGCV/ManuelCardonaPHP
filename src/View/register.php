<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
</head>
<body>
	<h2>Sign Up</h2>
	<br>
	<br>
	<?php if (isset($data['errors'])): ?>
		<div style="color: red;">
			<?= $data['errors']; ?>
		</div>

	<?php endif ?>
	<br>
	<form action="signin" method="post">
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
				<td><label for="email">Email</label></td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td><label for="phoneNumber">Phone Number</label></td>
				<td><input type="text" name="phoneNumber"></td>
			</tr>
			
			<tr>
				<td colspan="2"><input type="submit" value="SignUp"></td>
			</tr>
		</table>
	</form>
</body>
</html>