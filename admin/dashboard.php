<?php
include("../config/db.php");

$users = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$properties = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM properties"));
$transactions = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM transactions"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>

body{
margin:0;
font-family:Segoe UI;
background:#f4f6f9;
}

.sidebar{
width:220px;
height:100vh;
background:#111;
position:fixed;
padding-top:30px;
}

.sidebar a{
display:block;
color:white;
padding:15px;
text-decoration:none;
font-size:16px;
}

.sidebar a:hover{
background:#1abc9c;
}

.main{
margin-left:220px;
padding:30px;
}

.header{
font-size:28px;
margin-bottom:30px;
}

.cards{
display:flex;
gap:30px;
}

.card{
flex:1;
padding:25px;
border-radius:10px;
color:white;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

.users{background:#3498db;}
.properties{background:#27ae60;}
.transactions{background:#e67e22;}

.card h2{
font-size:40px;
margin:0;
}

</style>
</head>

<body>

<div class="sidebar">

<h2 style="color:white;text-align:center;">ADMIN</h2>

<a href="dashboard.php">Dashboard</a>
<a href="manage_properties.php">Manage Properties</a>
<a href="manage_users.php">Manage Users</a>
<a href="manage_transactions.php">Transactions</a>

</div>

<div class="main">

<div class="header">Real Estate Admin Dashboard</div>

<div class="cards">

<div class="card users">
<h2><?php echo $users; ?></h2>
<p>Total Users</p>
</div>

<div class="card properties">
<h2><?php echo $properties; ?></h2>
<p>Total Properties</p>
</div>

<div class="card transactions">
<h2><?php echo $transactions; ?></h2>
<p>Total Bookings</p>
</div>

</div>

</div>

</body>
</html>