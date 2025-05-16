
<?php
session_start();
// Sample data (you should fetch data from the database)
include "connection.php";   

// Fetch user data from the database
$sql = "SELECT booking_id, user_email, pickup_location, district, dropoff_location, booking_status, pickup_datetime, created_at, car_id FROM bookings";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
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
        
    /* Add these CSS styles to your existing styles */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
    .action-icons {
        display: flex;
        justify-content: space-around;
    }

    .action-icons a {
        text-decoration: none;
        color: #333;
        margin: 0 5px;
    }

    .action-icons a:hover {
        color: #ff0000; /* Change color when hovering */
    }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>BoltCabs</h2>
        <a href="adminpanel.php">Dashboard</a>
        <a href="adminpaneluser.php">Users</a>
        <a href="adminpaneltaxis.php">Cars & Drivers</a>
        <a href="#">Bookings</a>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="">
            <!-- ... Other sidebar links ... -->
            <a href="adminlogout.php">Logout</a> <!-- Add a link to the logout script -->
        </div>
    </div>

    <div class="content">
        
    <div class="user-list">
    <h2>Bookings List</h2>
    <table>
        <tr>
            <th>Booking Id</th>
            <th>User Email</th>
            <th>Pickup Location</th>
            <th>District</th>
            <th>Dropoff Location</th>
            <th>Booking Status</th>
            <th>Pickup date & time</th>
            <th>Created at</th>
            <th>car Id</th>
            <th>Actions</th> <!-- Add a new column for actions -->
        </tr>
        <?php
        // Loop through the retrieved user data and display it in a table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["booking_id"] . "</td>";
                echo "<td>" . $row["user_email"] . "</td>";
                echo "<td>" . $row["pickup_location"] . "</td>";
                echo "<td>" . $row["district"] . "</td>";
                echo "<td>" . $row["dropoff_location"] . "</td>";
                echo "<td>" . $row["booking_status"] . "</td>";
                echo "<td>" . $row["pickup_datetime"] . "</td>";
                echo "<td>" . $row["created_at"] . "</td>";
                echo "<td>" . $row["car_id"] . "</td>";
                // Add update and delete icons with links to their respective actions
                echo "<td class='action-icons'>";
                echo "<a href='edit_booking.php?id=" . $row["booking_id"] . "' title='Edit Booking'><i class='fa fa-edit'></i></a>";
                echo "<a href='delete_booking.php?id=" . $row["booking_id"] . "' title='Delete Booking'><i class='fa fa-trash'></i></a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "No users found.";
        }
        ?>
    </table>
</div>  
    </div>

    
</body>
</html>
