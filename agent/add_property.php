<?php
session_start();
include("../config/config.php");

if(!isset($_SESSION['user_id']) || $_SESSION['role']!='agent'){
header("Location: ../login.php");
exit();
}

if(isset($_POST['submit'])){

$title=$_POST['title'];
$location=$_POST['location'];
$price=$_POST['price'];
$description=$_POST['description'];

$image=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"../property_images/".$image);

$agent_id=$_SESSION['user_id'];

$query="INSERT INTO properties(agent_id,title,location,price,description,image,status)
VALUES('$agent_id','$title','$location','$price','$description','$image','pending')";

mysqli_query($conn,$query);

$msg="Property uploaded successfully. Waiting for admin approval.";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Property</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body{
font-family:'Poppins',sans-serif;
background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),
url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c');
background-size:cover;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.form-box{
background:white;
padding:35px;
width:400px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,.3);
}

h2{
text-align:center;
margin-bottom:20px;
}

input,textarea{
width:100%;
padding:10px;
margin:8px 0;
border-radius:6px;
border:1px solid #ccc;
}

button{
width:100%;
padding:10px;
background:#2a5298;
color:white;
border:none;
border-radius:6px;
cursor:pointer;
}

button:hover{
background:#1e3c72;
}

</style>

</head>

<body>

<div class="form-box">

<h2>Add Property</h2>

<?php
if(isset($msg)){
echo "<p style='color:green;text-align:center;'>$msg</p>";
}
?>

<form method="POST" enctype="multipart/form-data">

Title
<input type="text" name="title" required>

Location
<input type="text" name="location" required>

Price
<input type="number" name="price" required>

Description
<textarea name="description"></textarea>

Property Image
<input type="file" name="image" required>

<button name="submit">Upload Property</button>

</form>

</div>

</body>
</html>