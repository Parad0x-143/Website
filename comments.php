<?php
// Connect to the database
$servername = "sql12.freesqldatabase.com";
$username = "sql12652334";
$password = "XzwqmZATbQ";
$database = "comments";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle comment submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $text = $_POST["text"];

    $sql = "INSERT INTO comments (username, text) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $text);

    if ($stmt->execute()) {
        echo "Comment added successfully!";
    } else {
        echo "Error adding comment: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve comments
$sql = "SELECT * FROM comments ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["username"] . "</strong> - " . $row["text"] . "</p>";
    }
} else {
    echo "No comments yet.";
}

$conn->close();
?>
