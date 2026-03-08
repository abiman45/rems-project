<?php
session_start();
include("../config/config.php");

// Check login and role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit();
}

// Check property ID
if (!isset($_GET['id'])) {
    echo "Invalid property.";
    exit();
}

$property_id = intval($_GET['id']);

$query = "SELECT * FROM properties WHERE property_id = $property_id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Property not found.";
    exit();
}

$property = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Property Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f4f6f9; 
            padding: 20px; 
        }

        .container { 
            max-width: 800px; 
            margin: 0 auto; 
            background: white; 
            padding: 25px; 
            border-radius: 12px; 
            box-shadow: 0 8px 25px rgba(0,0,0,0.15); 
        }

        img { 
            width: 100%; 
            border-radius: 10px; 
            margin-bottom: 15px; 
        }

        h2 { 
            margin-bottom: 10px; 
            color: #0072ff; 
        }

        p { 
            margin-bottom: 10px; 
            color: #555; 
            font-size: 15px; 
        }

        .back-btn { 
            display: inline-block; 
            margin-top: 15px; 
            padding: 8px 12px; 
            background: #0072ff; 
            color: white; 
            border-radius: 6px; 
            text-decoration: none; 
            transition: 0.3s; 
        }

        .back-btn:hover { 
            background: #00c6ff; 
        }
    </style>
</head>
<body>

<div class="container">

    <?php
    $image = $property['property_images'] ?? '';

    if (!empty($image) && file_exists("../property_images/" . $image)) {
        echo '<img src="/rems/property_images/' . htmlspecialchars($image) . '" alt="Property Image">';
    } else {
        echo '<p>Image Available</p>';
    }
    ?>

    <h2><?php echo htmlspecialchars($property['title']); ?></h2>

    <p><strong>Property ID:</strong> <?php echo $property['property_id']; ?></p>

    <p><strong>Location:</strong> <?php echo htmlspecialchars($property['location']); ?></p>

    <p><strong>Price:</strong> ₹<?php echo number_format($property['price'], 2); ?></p>

    <p><strong>Description:</strong> <?php echo htmlspecialchars($property['description']); ?></p>


    <p><strong>Status:</strong> <?php echo htmlspecialchars($property['status']); ?></p>

    <a class="back-btn" href="dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>