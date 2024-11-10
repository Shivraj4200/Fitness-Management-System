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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .login-card {
            background: linear-gradient(to bottom, #4e54c8, #8f94fb);
            border-radius: 20px;
            padding: 40px;
            width: 400px;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .login-card h3 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-group label {
            font-weight: 500;
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

        .btn-signin {
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

        .btn-signin:hover {
            background: white;
            color: #4e54c8;
        }

        .alert {
            background-color: rgba(255, 0, 0, 0.1);
            color: white;
            border: none;
            border-radius: 30px;
            text-align: center;
            margin-bottom: 20px;
        }

        .signup-link {
            color: #c7d0ff;
            font-weight: bold;
        }

        .signup-link:hover {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3>Login</h3>
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $_SESSION["user"] = $email; // Store the user's email in session
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter your Email" name="email" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <input type="password" placeholder="Enter your Password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-signin">Sign In</button>
            <p class="text-center mt-3">
                Don't have an account? <a href="Signup.php" class="signup-link">Sign Up</a>
            </p>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
