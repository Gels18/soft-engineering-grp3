<?php
include '../config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $reqtype = $_POST['reqtype'];

    switch ($reqtype)
    {
        case 'signup':
            $fname    = $_POST['fname'];
            $lname    = $_POST['lname'];
            $email    = $_POST['email'];
            $role     = $_POST['role'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $hotel_id = json_encode([]);

            $query = "SELECT * FROM Users WHERE email = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                header("Location: ../create.php?status=exists");
                exit();
            }
            $query = "INSERT INTO Users (fname, lname, email, password, role) VALUES (?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("sssss", $fname, $lname, $email, $password, $role);
            $stmt->execute();
            header("Location: ../login.php?&tatus=registered");
            break;

        case 'login':
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT * FROM Users WHERE email = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user && password_verify($password, $user['password']))
            {
                $_SESSION['id']        = $user['id'];
                $_SESSION['email'] = $user['email'];
                header("Location: ../home.php");
            } else {
                header("Location: ../login.php?status=invalid");
            }
            break;

        default:
            header("Location: ../login.php?status=error");
            break;
    }
}
?>
