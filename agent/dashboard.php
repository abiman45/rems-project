<?php
session_start();
include("../config/config.php");

if(!isset($_SESSION['user_id']) || $_SESSION['role']!='agent'){
header("Location: ../login.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Agent Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f2f4f8;
}

header{
background:linear-gradient(90deg,#1e3c72,#2a5298);
color:white;
padding:20px;
text-align:center;
font-size:24px;
font-weight:600;
}

.container{
width:80%;
margin:auto;
margin-top:40px;
}

.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:25px;
}

.card{
background:white;
padding:30px;
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,0.15);
text-align:center;
transition:.3s;
}

.card:hover{
transform:translateY(-6px);
}

.card a{
display:inline-block;
margin-top:15px;
padding:10px 18px;
background:#2a5298;
color:white;
text-decoration:none;
border-radius:6px;
}

.card a:hover{
background:#1e3c72;
}

</style>
</head>

<body>

<header>
Agent Dashboard
</header>

<div class="container">

<h2 style="margin-bottom:30px;">
Welcome <?php echo $_SESSION['name']; ?>
</h2>

<div class="grid">

<div class="card">
<h3>Add New Property</h3>
<p>Upload villa or house for sale</p>
<a href="add_property.php">Add Property</a>
</div>

<div class="card">
<h3>My Properties</h3>
<p>View properties uploaded by you</p>
<a href="view_properties.php">View Properties</a>
</div>

<div class="card">
<h3>Logout</h3>
<p>Exit your dashboard</p>
<a href="../logout.php">Logout</a>
</div>

</div>

</div>

</body>
</html>