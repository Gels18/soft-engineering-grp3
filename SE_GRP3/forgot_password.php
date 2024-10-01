<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $security_question = $_POST['security-question'];
    $security_answer = $_POST['security-answer'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'se_grp3');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT UserID FROM client WHERE Email = ? AND QuestionResponse = ?");
    $stmt->bind_param("ss", $email, $security_answer);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        // Correct answer, set session variable and redirect to the new password page
        $stmt->bind_result($userID);
        $stmt->fetch();
        $_SESSION['UserID'] = $userID;
        $_SESSION['email'] = $email; // Optionally store email for further use
        header("Location: enter_new_password.php");
        exit();
    } else {
        // Incorrect answer
        $message = "Incorrect security answer.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

        input[type="email"],
        input[type="text"] {
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
        <h2>Forgot Password</h2>
        <?php
        if (isset($message)) {
            echo '<p class="message">' . htmlspecialchars($message) . '</p>';
        }
        ?>
        <form action="enter_new_password.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="security-question">Security Question</label>
                <select id="security-question" name="security-question" required>
                    <option value="">Select a question</option>
                    <option value="pet-name">What is your pet's name?</option>
                    <option value="mother-maiden-name">What is your mother's maiden name?</option>
                    <option value="first-school">What was the name of your first school?</option>
                </select>
            </div>
            <div class="form-group">
                <label for="security-answer">Answer</label>
                <input type="text" id="security-answer" name="security-answer" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
        <div class="back-to-login">
            <p>Remembered your password? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
