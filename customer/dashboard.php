<?php
session_start();
include("../config/config.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit();
}

$query = "SELECT * FROM properties ORDER BY property_id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f4f6f9;
}

/* HEADER */

header{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 40px;
background:linear-gradient(135deg,#667eea,#764ba2);
color:white;
}

header h2{
font-weight:600;
}

.logout{
background:#ff4b2b;
padding:8px 15px;
border-radius:6px;
color:white;
text-decoration:none;
font-size:14px;
}

/* WELCOME */

.welcome{
text-align:center;
margin:25px 0;
font-size:20px;
color:#333;
}

/* GRID */

.property-grid{
max-width:1200px;
margin:auto;
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:25px;
padding:20px;
}

/* CARD */

.property-card{
background:white;
border-radius:12px;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,0.15);
transition:0.3s;
}

.property-card:hover{
transform:translateY(-6px);
box-shadow:0 15px 35px rgba(0,0,0,0.25);
}

/* IMAGE */

.property-card img{
width:100%;
height:180px;
object-fit:cover;
}

/* INFO */

.property-info{
padding:15px;
text-align:center;
}

.property-info h3{
font-size:18px;
color:#333;
margin-bottom:5px;
}

.property-info p{
font-size:14px;
color:#666;
margin-bottom:8px;
}

/* BUTTONS */

.btn{
display:inline-block;
margin-top:8px;
padding:8px 15px;
border-radius:6px;
text-decoration:none;
font-size:14px;
color:white;
transition:0.3s;
}

.details-btn{
background:#3498db;
}

.book-btn{
background:#2ecc71;
}

.btn:hover{
opacity:0.85;
}

.no-image{
height:180px;
display:flex;
align-items:center;
justify-content:center;
background:#ddd;
color:#555;
}

</style>

</head>

<body>

<header>

<h2>🏠 Real Estate Dashboard</h2>

<a class="logout" href="../logout.php">Logout</a>

</header>

<div class="welcome">
Welcome, <b><?php echo $_SESSION['name']; ?></b>
</div>

<div class="property-grid">

<?php while($property = mysqli_fetch_assoc($result)) { ?>

<div class="property-card">

<?php if(!empty($property['image'])) { ?>

<img src="../property_images/<?php echo $property['image']; ?>">

<?php } else { ?>

<div class="no-image">No Image</div>

<?php } ?>

<div class="property-info">

<h3><?php echo $property['location']; ?></h3>

<p>Property ID: <?php echo $property['property_id']; ?></p>

<p>Price: ₹<?php echo $property['price']; ?></p>

<a class="btn details-btn"
href="property_details.php?id=<?php echo $property['property_id']; ?>">
View Details
</a>

<a class="btn book-btn"
href="booking.php?id=<?php echo $property['property_id']; ?>">
Book Now
</a>

</div>

</div>

<?php } ?>

</div>

</body>
</html>