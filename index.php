<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Management System</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            background: linear-gradient(
                        rgba(0,0,0,0.6),
                        rgba(0,0,0,0.6)
                    ),
                    url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 50px;
            border-radius: 15px;
            text-align: center;
            color: white;
            width: 400px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            transition: 0.3s;
        }

        .login-btn {
            background: #0d6efd;
            color: white;
        }

        .register-btn {
            background: #28a745;
            color: white;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.4);
        }

        .welcome {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">

<?php if(isset($_SESSION['name'])): ?>

    <h1>🏡 Real Estate Management</h1>
    <div class="welcome">
        Welcome, <?php echo $_SESSION['name']; ?> <br>
        Role: <?php echo $_SESSION['role']; ?>
    </div>

    <a href="logout.php" class="btn logout-btn">Logout</a>

<?php else: ?>

    <h1>🏡 Luxury Real Estate</h1>
    <p>Find Premium Properties with Elegance & Trust</p>

    <a href="login.php" class="btn login-btn">Login</a>
    <a href="register.php" class="btn register-btn">Register</a>

<?php endif; ?>

</div>

</body>
</html>