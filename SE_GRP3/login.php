<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="CSS/login.css"> <!-- Link to your CSS file -->
</head>
<body>
	<div class="login-container">
		<h2>Login</h2>
		<form action="phpscript/process_login.php" method="POST">
			<label for="email">Email:</label><br>
			<input type="email" id="email" name="email" required><br><br>

			<label for="password">Password:</label><br>
			<input type="password" id="password" name="password" required><br><br>

			<input type="hidden" name="reqtype" value="login">
			<input type="submit" name="submit" value="Login">
		</form>
		<div class="register-link">
			<p>Don't have an account? <a href="create.php">Register here</a></p>
		</div>
	</div>
</body>
</html>
