<?php
session_start();
include("config/config.php");

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            if($row['role'] == 'customer'){
    header("Location: customer/dashboard.php");
}
elseif($row['role'] == 'agent'){
    header("Location: agent/dashboard.php");
}
elseif($row['role'] == 'admin'){
    header("Location: admin/dashboard.php");
}

exit();

        } else {
            $error = "Incorrect Password!";
        }

    } else {
        $error = "Email Not Found!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Real Estate Management</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('https://images.unsplash.com/photo-1560185007-cde436f6a4d0') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 40px;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            color: white;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }

        .login-container input[type="submit"] {
            background: #00c6ff;
            background: linear-gradient(to right, #0072ff, #00c6ff);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.4);
        }

        .error {
            background: rgba(255, 0, 0, 0.2);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
        }

        .brand {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
            opacity: 0.8;
        }

        @media (max-width: 400px) {
            .login-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="brand">🏠 Real Estate Portal</div>
    <h2>Welcome Back</h2>

    <?php
    if (isset($error)) {
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="submit" name="login" value="Login">
    </form>
</div>

</body>
</html>