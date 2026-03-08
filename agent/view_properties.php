<?php
session_start();
include("../config/config.php");

if(!isset($_SESSION['user_id']) || $_SESSION['role']!='agent'){
header("Location: ../login.php");
exit();
}

$agent_id=$_SESSION['user_id'];

$query="SELECT * FROM properties WHERE agent_id='$agent_id'";
$result=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>

<title>My Properties</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body{
font-family:'Poppins',sans-serif;
background:#f2f4f8;
}

header{
background:#2a5298;
color:white;
padding:18px;
text-align:center;
font-size:22px;
}

.grid{
width:90%;
margin:auto;
margin-top:30px;
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:25px;
}

.card{
background:white;
border-radius:12px;
overflow:hidden;
box-shadow:0 6px 18px rgba(0,0,0,.15);
}

.card img{
width:100%;
height:180px;
object-fit:cover;
}

.info{
padding:15px;
}

.info h4{
margin-bottom:6px;
}

.status{
font-size:14px;
font-weight:600;
color:#2a5298;
}

</style>

</head>

<body>

<header>My Uploaded Properties</header>

<div class="grid">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="card">

<img src="../property_images/<?php echo $row['image']; ?>">

<div class="info">

<h4><?php echo $row['title']; ?></h4>

<p><?php echo $row['location']; ?></p>

<p>₹ <?php echo $row['price']; ?></p>

<p class="status">Status: <?php echo $row['status']; ?></p>

</div>

</div>

<?php } ?>

</div>

</body>
</html>