<?php
include "connection.php";
// Check if a user ID is provided in the URL
if (isset($_GET['id'])) {
    $taxiId = $_GET['id'];

    // SQL query to delete the user by ID
    $sql = "DELETE FROM taxis WHERE taxi_id = $taxiId";

    if ($conn->query($sql) === TRUE) {
        // User deleted successfully, redirect back to the user list page
        echo "<script>
                alert('Taxi Deleted Successfully!');
            </script>";
        header("Location: adminpaneltaxis.php");
        exit();
    } else {
        echo "Error deleting taxi: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Taxi ID not provided.";
}
?>
