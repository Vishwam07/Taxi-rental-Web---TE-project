<?php
include "connection.php";
// Check if a user ID is provided in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // SQL query to delete the user by ID
    $sql = "DELETE FROM registration WHERE user_id = $userId";

    if ($conn->query($sql) === TRUE) {
        // User deleted successfully, redirect back to the user list page
        echo "<script>
                alert('User Deleted Successfully!');
            </script>";
        header("Location: adminpaneluser.php");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "User ID not provided.";
}
?>
