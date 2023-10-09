<?php
// Establish a database connection (same as above)

// Fetch comments from the database
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><strong>" . $row["user_name"] . ":</strong> " . $row["comment_text"] . "</p>";
    }
} else {
    echo "No comments yet.";
}

// Close the database connection
mysqli_close($conn);
?>
