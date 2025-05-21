<?php

use LDAP\Result;

include("../config/database.php");

$Error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {//نتأكد أن المستخدم ضغط على زر "Register" وأرسل البيانات
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $Error[] = "All fields are required!";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $Error[] = "Invalid email format!";
        } elseif ($password !== $confirm_password) {
            $Error[] = "Passwords do not match!";
        } else {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            

            if ($result) {
                $Error[] = "Email already exists";
            
            } else {
                // Hash the password and insert new user
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $created_at = date("Y-m-d H:i:s");

                $sql = "INSERT INTO users (username, email, password, created_at) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$username, $email, $hashed_password, $created_at]); 
                $Result = $stmt->rowCount();               

                if ($Result > 0) {
                    header("Location: login.php"); // Redirect to login page
                    exit(); // Stop execution after redirection
                } else {
                    $Error[] = "Error during registration";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        .container{
            background-image: url('../img/img1.jpg');
            font-family: Arial, sans-serif;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 97vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
        form {
            background-color: rgb(248, 246, 231);
            padding: 12px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            height: 460px;
        }

        label {
            font-size: 14px;
            color: #555;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            background: linear-gradient(to right, rgb(195, 240, 173), rgb(245, 192, 178));
            color: white;
            border: none;
            padding: 10px;
            margin: 11px;
            width: 95%;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, rgb(123, 201, 84), rgb(245, 146, 118));
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (!empty($Error)) {
            foreach ($Error as $item) {
                echo "<p class='error-message'>" . $item . "</p>";
            }
        }
        ?>
        <form action="register.php" method="POST">
            <label for="username">Name:</label>
            <input type="text" name="username" id="username" value="<?php echo isset($username) ? $username : ""; ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ""; ?>"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo isset($password) ? $password : ""; ?>" required><br><br>

            <label for="confirm-password">Confirm password:</label>
            <input type="password" name="confirm-password" value="<?php echo isset($confirm_password) ? $confirm_password : ""; ?>" required>

            <input type="submit" value="Register">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>
