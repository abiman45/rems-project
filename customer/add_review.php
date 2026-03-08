<?php
include("../config/config.php");

if (isset($_POST['submit'])) {

    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $property_id = mysqli_real_escape_string($conn, $_POST['property_id']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $query = "INSERT INTO reviews (user_id, property_id, rating, comment)
              VALUES ('$user_id', '$property_id', '$rating', '$comment')";

    if (mysqli_query($conn, $query)) {
        $success = "Review Added Successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
</head>
<body>

<h2>Add Review</h2>

<?php
if (isset($success)) {
    echo "<p style='color:green;'>$success</p>";
}
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

    <label>User ID:</label><br>
    <input type="number" name="user_id" required><br><br>

    <label>Property ID:</label><br>
    <input type="number" name="property_id" required><br><br>

    <label>Rating (1-5):</label><br>
    <input type="number" name="rating" min="1" max="5" required><br><br>

    <label>Comment:</label><br>
    <textarea name="comment" required></textarea><br><br>

    <input type="submit" name="submit" value="Submit Review">

</form>

</body>
</html>