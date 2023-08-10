<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include ('core.php'); ?>
</head>
<body>
<?php
    $securityCodeErr = $forgotUsernameErr = "";

    $username = urldecode($_GET['username']);

    $sql_SC = "SELECT securityCode
    FROM Users
    WHERE pseudo = '".$username."'";

    $stmt2 = $mysqli->prepare($sql_SC);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->fetch();

    $nb2 = $stmt2->num_rows;  
    echo $nb2;
    
    if (!$nb2) { 
        $securityCodeErr = "The security code is not exact";

    }
    else if($nb2) {
        $mysqli->close();
        $securityCodeErr = "cool";
        //header("location:passwordForgotten3.php");
    }
    ?>
</body>
</html>

