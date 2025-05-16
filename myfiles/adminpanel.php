<?php
session_start();
// Sample data (you should fetch data from the database)
$usersCount = 100;
$driversCount = 50;
$bookingsCount = 200;
$carsCount = 75;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
        }

        .sidebar {
            background-color: #333;
            color: white;
            width: 250px;
            padding: 20px;
            min-height: 100vh;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin-bottom: 10px;
            padding: 10px;
        }

        .sidebar a:hover {
            background-color: #444;
        }

        .header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        button {
            background-color: #fff;
            color: black;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: grey;
        }

        .statistics {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .stat-box {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            flex: 1;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>BoltCabs</h2>
        <a href="adminpanel.php">Dashboard</a>
        <a href="adminpaneluser.php">Users</a>
        <a href="adminpaneltaxis.php">Cars & Drivers</a>
        <a href="adminpanelbooking.php">Bookings</a>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="">
            <!-- ... Other sidebar links ... -->
            <a href="adminlogout.php">Logout</a> <!-- Add a link to the logout script -->
        </div>
    </div>

    <div class="content">
        <div class="header">
            <h1>WELCOME TO ADMIN PANEL - <?php echo $_SESSION['AdminloginId']?></h1>
            
        </div>

        <div class="statistics">
            <!-- Statistics content goes here -->
        </div>
    </div>
</body>
</html>
