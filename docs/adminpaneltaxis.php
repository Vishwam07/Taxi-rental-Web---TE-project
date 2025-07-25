<?php
session_start();
// Sample data (you should fetch data from the database)
include "connection.php";   

// Fetch user data from the database
$sql = "SELECT taxi_id, taxi_regno, taxi_model, taxi_color, taxi_capacity, taxi_type, taxi_status, taxi_image, taxi_location, taxi_drivername FROM taxis";
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
        <a href="#">Cars & Drivers</a>
        <a href="adminpanelbooking.php">Bookings</a>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="">
            <!-- ... Other sidebar links ... -->
            <a href="adminlogout.php">Logout</a> <!-- Add a link to the logout script -->
        </div>
    </div>

    <div class="content">
        
    <div class="taxi details">
    <h2>Taxi details</h2>
    <table>
        <tr>
            <th>Taxi Id</th>
            <th>taxi Regno</th>
            <th>Taxi Model</th>
            <th>Taxi color</th>
            <th>Taxi Capacity</th>
            <th>Taxi Type</th>
            <th>Taxi Status</th>
            <th>Taxi Image</th>
            <th>Taxi Location</th>
            <th>Taxi driver Name</th>
            <th>Actions</th> <!-- Add a new column for actions -->
        </tr>
        <?php
        // Loop through the retrieved user data and display it in a table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["taxi_id"] . "</td>";
                echo "<td>" . $row["taxi_regno"] . "</td>";
                echo "<td>" . $row["taxi_model"] . "</td>";
                echo "<td>" . $row["taxi_color"] . "</td>";
                echo "<td>" . $row["taxi_capacity"] . "</td>";
                echo "<td>" . $row["taxi_type"] . "</td>";
                echo "<td>" . $row["taxi_status"] . "</td>";
                echo "<td>" . '<img src="" . $row["taxi_image"] . alt="Car Image" class="car-image" >' . "</td>";
              
                echo "<td>" . $row["taxi_location"] . "</td>";
                echo "<td>" . $row["taxi_drivername"] . "</td>";
                // Add update and delete icons with links to their respective actions
                echo "<td class='action-icons'>";
                echo "<a href='edit_taxi.php?id=" . $row["taxi_id"] . "' title='Edit Taxi'><i class='fa fa-edit'></i></a>";
                echo "<a href='delete_taxi.php?id=" . $row["taxi_id"] . "' title='Delete Taxi'><i class='fa fa-trash'></i></a>";
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
