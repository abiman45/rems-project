<?php
include("config/config.php");

if (isset($_POST['register'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        $error = "Email already registered!";
    } else {

        $query = "INSERT INTO users (name, email, password, role)
                  VALUES ('$name', '$email', '$password', '$role')";

        if (mysqli_query($conn, $query)) {
            $success = "Registration Successful!";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Luxury Villas</title>

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
            background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),
                        url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            width: 380px;
            padding: 40px;
            border-radius: 18px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(18px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
            color: #fff;
        }

        .register-card h2 {
            text-align: center;
            margin-bottom: 10px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .subtitle {
            text-align: center;
            font-size: 13px;
            margin-bottom: 25px;
            opacity: 0.8;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            background: rgba(255,255,255,0.9);
        }

        input:focus, select:focus {
            box-shadow: 0 0 8px #00c6ff;
            transform: scale(1.02);
            transition: 0.3s ease;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(to right, #141E30, #243B55);
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.5);
        }

        .error {
            background: rgba(255, 0, 0, 0.25);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
        }

        .success {
            background: rgba(0, 255, 0, 0.25);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
        }

        @media(max-width: 420px) {
            .register-card {
                width: 90%;
                padding: 25px;
            }
        }
    </style>
</head>
<body>

<div class="register-card">

    <h2>🏡 Create Account</h2>
    <div class="subtitle">Join Our Luxury Villa Marketplace</div>

    <?php
    if (isset($error)) echo "<div class='error'>$error</div>";
    if (isset($success)) echo "<div class='success'>$success</div>";
    ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Create Password" required>

        <select name="role" required>
            <option value="">Select Role</option>
            <option value="agent">Agent</option>
            <option value="customer">Customer</option>
        </select>

        <button type="submit" name="register">Register Now</button>
    </form>

</div>

</body>
</html>