<?php
session_start();
include("../config/db.php");

$result = mysqli_query($conn,"SELECT * FROM properties WHERE status='available'");

echo "<h2>Available Properties</h2>";

while($row = mysqli_fetch_assoc($result)){

    echo "<h3>".$row['title']."</h3>";
    echo "Price: ₹".$row['price']."<br>";
    echo "Location: ".$row['location']."<br>";
    echo "Type: ".$row['type']."<br>";

    // Fetch images
    $property_id = $row['property_id'];
    $images = mysqli_query($conn,"SELECT * FROM property_images WHERE property_id='$property_id'");

    while($img = mysqli_fetch_assoc($images)){
        echo "<img src='../uploads/".$img['image_path']."' width='150'> ";
    }

    echo "<hr>";
}
?>