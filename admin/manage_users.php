<?php
include("../config/db.php");

if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    mysqli_query($conn,"DELETE FROM users WHERE user_id=$id");
    header("Location: manage_users.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM users ORDER BY user_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Users</title>

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
box-shadow:0 3px 8px rgba(0,0,0,0.2);
}

th{
background:#34495e;
color:white;
padding:12px;
}

td{
padding:10px;
border-bottom:1px solid #eee;
text-align:center;
}

tr:hover{
background:#f2f2f2;
}

.delete{
background:#e74c3c;
color:white;
padding:6px 10px;
border-radius:5px;
text-decoration:none;
}

.delete:hover{
background:#c0392b;
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

<h2>Manage Users</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Role</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['user_id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['role']; ?></td>

<td>
<a class="delete" href="?delete=<?php echo $row['user_id']; ?>">Delete</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>