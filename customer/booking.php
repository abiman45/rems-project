<?php
session_start();
include("../config/config.php");

$property_id = $_GET['id'];
$customer_id = $_SESSION['user_id'];

if(isset($_POST['book'])){

$date = $_POST['date'];

$query = "INSERT INTO bookings(property_id,customer_id,booking_date)
VALUES('$property_id','$customer_id','$date')";

mysqli_query($conn,$query);

$booking_id = mysqli_insert_id($conn);

header("Location: transaction.php?booking_id=".$booking_id);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Property</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(135deg,#00c6ff,#0072ff);
}

/* Booking Card */

.booking-card{
width:380px;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 15px 35px rgba(0,0,0,0.25);
text-align:center;
}

.booking-card h2{
margin-bottom:20px;
color:#333;
}

/* Input */

input{
width:100%;
padding:12px;
margin-top:10px;
border-radius:8px;
border:1px solid #ccc;
outline:none;
transition:0.3s;
}

input:focus{
border-color:#0072ff;
}

/* Button */

button{
width:100%;
margin-top:20px;
padding:12px;
border:none;
border-radius:8px;
background:linear-gradient(135deg,#28a745,#2ecc71);
color:white;
font-size:16px;
cursor:pointer;
transition:0.3s;
}

button:hover{
transform:scale(1.05);
}

.back{
display:block;
margin-top:15px;
color:#555;
text-decoration:none;
font-size:14px;
}

</style>
</head>

<body>

<div class="booking-card">

<h2>📅 Book Property</h2>

<form method="POST">

<label>Select Booking Date</label>

<input type="date" name="date" required>

<button name="book">Confirm Booking</button>

</form>

<a class="back" href="dashboard.php">⬅ Back to Dashboard</a>

</div>

</body>
</html>