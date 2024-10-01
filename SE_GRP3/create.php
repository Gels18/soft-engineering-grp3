<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="CSS/create.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="phpscript/process_login.php" method="POST">
            <label for="fname">First Name:</label><br>
            <input type="text" id="fname" name="fname" required><br>

            <label for="lname">Last Name:</label><br>
            <input type="text" id="lname" name="lname" required><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>

            <label for="role">Role:</label><br>
            <select id="role" name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select><br><br>

            <input type="hidden" name="reqtype" value="signup">
            <input type="submit" name="submit" value="Register">
        </form>
            <div class="login-link">
        <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
</div>
</body>
</html>
