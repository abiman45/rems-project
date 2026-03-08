<?php
$conn = mysqli_connect("localhost", "root", "", "rems");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>
<?php
$conn = mysqli_connect("localhost","root","","rems");

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}
?>