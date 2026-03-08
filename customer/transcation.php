<?php
session_start();
include("../config/config.php");

$booking_id = $_GET['booking_id'];

if(isset($_POST['pay'])){

$amount = $_POST['amount'];
$method = $_POST['method'];

$query = "INSERT INTO transactions(booking_id,amount,payment_method)
VALUES('$booking_id','$amount','$method')";

mysqli_query($conn,$query);

echo "<script>alert('Payment Successful');window.location='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>

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
background:linear-gradient(135deg,#ff9966,#ff5e62);
}

/* Payment Card */

.payment-card{
width:400px;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 15px 35px rgba(0,0,0,0.25);
text-align:center;
}

.payment-card h2{
margin-bottom:20px;
color:#333;
}

/* Inputs */

input,select{
width:100%;
padding:12px;
margin-top:10px;
border-radius:8px;
border:1px solid #ccc;
outline:none;
transition:0.3s;
}

input:focus,select:focus{
border-color:#ff5e62;
}

/* Button */

button{
width:100%;
margin-top:20px;
padding:12px;
border:none;
border-radius:8px;
background:linear-gradient(135deg,#ff5e62,#ff9966);
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

<div class="payment-card">

<h2>💳 Property Payment</h2>

<form method="POST">

<label>Amount</label>
<input type="number" name="amount" required>

<label>Payment Method</label>

<select name="method">

<option value="UPI">UPI</option>
<option value="Card">Card</option>
<option value="Cash">Cash</option>

</select>

<button name="pay">Pay Now</button>

</form>

<a class="back" href="dashboard.php">⬅ Cancel</a>

</div>

</body>
</html>