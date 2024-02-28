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

if(isset($_POST['submit'])) {
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    // Insert image data into the database
    $insert = $conn->query("INSERT into Images (image_data) VALUES ('$imgContent')");
    if($insert){
        echo "File uploaded successfully.";
    }else{
        echo "File upload failed, please try again.";
    } 
}
// Close database connection
$conn->close();
?>
