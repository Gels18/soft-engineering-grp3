<?php
session_start();

if (!isset($_SESSION['UserID'])) {
    header("Location: forgot_password.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];

    if ($new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $conn = new mysqli('localhost', 'root', '', 'se_grp3');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update the password in the database
        $stmt = $conn->prepare("UPDATE client SET Password = ? WHERE UserID = ?");
        $stmt->bind_param("si", $hashed_password, $_SESSION['UserID']);
        if ($stmt->execute()) {
            // Password updated successfully, redirect to login page
            session_destroy();
            header("Location: login.php?message=Password%20updated%20successfully");
            exit();
        } else {
            $message = "Error updating password.";
        }

        $stmt->close();
        $conn->close();
    } else {
        $message = "Passwords do not match.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter New Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            color: green;
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .container {
                width: 90%;
                margin: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter New Password</h2>
        <?php
        if (isset($message)) {
            echo '<p class="message">' . htmlspecialchars($message) . '</p>';
        }
        ?>
        <form action="enter_new_password.php" method="POST">
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit">Set New Password</button>
        </form>
    </div>
</body>
</html>
