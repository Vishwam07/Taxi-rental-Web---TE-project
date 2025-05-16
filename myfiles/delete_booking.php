<?php
include "connection.php";
// Check if a user ID is provided in the URL
if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];

    // SQL query to delete the user by ID
    $sql = "DELETE FROM bookings WHERE booking_id = $bookingId";

    if ($conn->query($sql) === TRUE) {
        // User deleted successfully, redirect back to the user list page
        echo "<script>
                alert('Booking Deleted Successfully!');
            </script>";
        header("Location: adminpaneltaxis.php");
        exit();
    } else {
        echo "Error deleting booking: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Booking Id not provided.";
}
?>
