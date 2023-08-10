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
    $forgotUsernameErr = $securityCodeErr = "";
    
    $sql_forgotUsername = "SELECT pseudo
    FROM Users
    WHERE pseudo = ?";

    $stmt = $mysqli->prepare($sql_forgotUsername);
    $stmt->bind_param("s", $_GET['q']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->fetch();

    $nb = $stmt->num_rows;  
    
    if (!$nb) { 
        $forgotUsernameErr = "This username does not exist";

    }
    else if($nb) {
        $mysqli->close();
        header('location:passwordForgotten2.php');

    }

    ?>

<form method="post">
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="" placeholder="Username">
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <button type="button" name="confirmUsername" id="idConfirmForgotUsername" onclick="getUsername(forgotUsername.value)" required>confirm username</button><br><br>

    </form>
</body>
</html>

