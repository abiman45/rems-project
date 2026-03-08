<?php
include("../config/db.php");

$result=mysqli_query($conn,"
SELECT transactions.*, users.name, properties.title
FROM transactions
JOIN users ON transactions.user_id = users.user_id
JOIN properties ON transactions.property_id = properties.property_id
ORDER BY transaction_id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Transactions</title>

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

.date{
background:#3498db;
color:white;
padding:4px 8px;
border-radius:5px;
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

<h2>Property Transactions</h2>

<table>

<tr>
<th>ID</th>
<th>Customer</th>
<th>Property</th>
<th>Booking Date</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['transaction_id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['title']; ?></td>

<td>
<span class="date">
<?php echo $row['booking_date']; ?>
</span>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>