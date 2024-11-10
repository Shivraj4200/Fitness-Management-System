<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .signup-card {
            background: linear-gradient(to bottom, #4e54c8, #8f94fb);
            border-radius: 20px;
            padding: 40px;
            width: 400px;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .signup-card h3 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .form-control {
            border-radius: 30px;
            border: none;
            height: 50px;
            padding-left: 20px;
        }
        .form-control:focus {
            box-shadow: none;
            border: 1.5px solid #fff;
        }
        .btn-signup {
            width: 100%;
            background: transparent;
            border: 2px solid white;
            border-radius: 30px;
            color: white;
            height: 50px;
            font-weight: bold;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .btn-signup:hover {
            background: white;
            color: #4e54c8;
        }
        .signin-link {
            color: #c7d0ff;
            font-weight: bold;
        }
        .signin-link:hover {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="signup-card">
        <h3>Sign Up</h3>
        <?php
        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();
            if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid email format");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Passwords do not match");
            }

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                array_push($errors, "Email already registered");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                
                if (mysqli_stmt_execute($stmt)) {
                    echo "<div class='alert alert-success'>Registration successful. <a href='login.php'>Login Here</a></div>";
                } else {
                    echo "<div class='alert alert-danger'>Something went wrong. Please try again later.</div>";
                }
            }
        }
        ?>
        <form action="Signup.php" method="POST">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your Full Name" required>
            </div>
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
            </div>
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Create a Password" required>
            </div>
            <div class="form-group mt-3">
                <label for="repeat_password">Confirm Password</label>
                <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Confirm your Password" required>
            </div>
            <button type="submit" class="btn btn-signup" name="submit">Sign Up</button>
            <p class="text-center mt-3">
                Already have an account? <a href="Login.php" class="signin-link">Sign In</a>
            </p>
        </form>
    </div>
</body>
</html>
