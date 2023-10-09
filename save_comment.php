<?php
// Establish a database connection (you'll need to configure your database credentials)
$conn = mysqli_connect("localhost", "id20030703_host", "Parad0x_143", "id20030703_demo);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_text = $_POST["comment"];
    $user_name = $_POST["username"];

    // Perform input validation and sanitation as needed

    // Insert the comment into the database
    $sql = "INSERT INTO comments (comment_text, user_name) VALUES ('$comment_text', '$user_name')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Comment saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
