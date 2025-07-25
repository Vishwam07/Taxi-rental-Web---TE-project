<?php
session_start(); // Start the session

if (isset($_SESSION['AdminloginId'])) {
    // Unset the session variable
    unset($_SESSION['AdminloginId']);

    // Destroy the session
    session_destroy();
}
echo '<script>alert("You have been successfully logged out.");
setTimeout(function() {
    window.location.href = "adminlogin.php"; // Redirect after 2 seconds
}, 2000);</script>';

// Redirect the user to the login page or any other desired page
header('Location: adminlogin.php'); // Replace 'login.php' with the page you want to redirect to

?>
