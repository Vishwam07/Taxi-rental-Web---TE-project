<?php
require("connection.php");
?>
<html>
    <head>
        <title>Admin login</title>
        <meta charset="utf-8" name="viewport" content="">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15,1/css/all.css">
        <link rel="stylesheet" type="text/css" href="./style/mycss.css">

    </head>
    <body>
        <div class="login-form">
            <h2>ADMIN LOGIN</h2>
            <form method="post">
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Admin Name" name="Adminname">
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="password" name="Adminpassword">
                </div>

                <button type="submit" name="Signin">Sign In</button>

            </form>
        </div>

        <?php
if(isset($_POST['Signin'])){
    // Assuming you have a database connection established as $conn
    
    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM `admin_login` WHERE `admin_name`=? AND `admin_password`=?";
    $stmt = mysqli_prepare($conn, $query);
    
    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "ss", $_POST['Adminname'], $_POST['Adminpassword']);
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    
    if(mysqli_num_rows($result) == 1){
        session_start();
        $_SESSION['AdminloginId'] = $_POST['Adminname'];
        header("location: adminpanel.php");
    }
    else{
        echo "<script>alert('Incorrect Password Or Username not found');</script>";
    }
}
?>

    </body>
</html>