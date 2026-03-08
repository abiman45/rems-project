<?php
include("../config/db.php");

if(isset($_GET['delete'])){
$id = intval($_GET['delete']);
mysqli_query($conn,"DELETE FROM properties WHERE property_id=$id");
header("Location: manage_properties.php");
exit();
}

$result = mysqli_query($conn,"
SELECT properties.*, users.name
FROM properties
JOIN users ON properties.agent_id = users.user_id
ORDER BY property_id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Properties</title>

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
padding:14px;
text-decoration:none;
}

.sidebar a:hover{
background:#1abc9c;
}

.main{
margin-left:220px;
padding:30px;
}

h2{
margin-bottom:20px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

th{
background:#2c3e50;
color:white;
padding:12px;
}

td{
padding:10px;
text-align:center;
border-bottom:1px solid #eee;
}

tr:hover{
background:#f2f2f2;
}

img{
width:120px;
height:80px;
object-fit:cover;
border-radius:6px;
}

.delete{
background:#e74c3c;
color:white;
padding:6px 12px;
border-radius:5px;
text-decoration:none;
}

.delete:hover{
background:#c0392b;
}

.status{
padding:4px 8px;
border-radius:5px;
color:white;
font-size:13px;
}

.approved{background:green;}
.pending{background:orange;}

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

<h2>Manage Properties</h2>

<table>

<tr>
<th>ID</th>
<th>Title</th>
<th>Location</th>
<th>Price</th>
<th>Agent</th>
<th>Status</th>
<th>Image</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['property_id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['location']; ?></td>

<td>₹<?php echo $row['price']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>
<span class="status <?php echo $row['status']; ?>">
<?php echo $row['status']; ?>
</span>
</td>

<td>
<img src="../property_images/<?php echo $row['image']; ?>">
</td>

<td>
<a class="delete" href="?delete=<?php echo $row['property_id']; ?>">Delete</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>