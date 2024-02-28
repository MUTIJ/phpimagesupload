<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "equipments db";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve image data from the database
$sql = "SELECT image_data FROM Images WHERE id = ?";
$stmt = $conn->prepare($sql);
$id = 1 || 2; // Replace 1 with the ID of the image you want to retrieve
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Check if image data exists
if ($result->num_rows > 0) {
    // Set appropriate content type header
    header("Content-Type: image/jpeg"); // Assuming JPEG format for the image

    // Output image data
    $row = $result->fetch_assoc();
    echo $row['image_data'];
} else {
    echo "Image not found.";
}

// Close database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Image</title>
</head>
<body>
    <img src="display_image.php" alt="Image">
</body>
</html>

