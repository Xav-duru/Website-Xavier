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

    $username=$_GET['q'];
    $stmt = $mysqli->prepare($sql_forgotUsername);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->fetch();

    $nb = $stmt->num_rows;  
    
    if (!$nb) { 
        $forgotUsernameErr = "This username does not exist";
        ?>
        <label for="idUsername">Username : </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="" placeholder="Username" required>
        <span name="errorUsername" class="error">* <?php echo $forgotUsernameErr ?></span><br><br>

        <button type="button" name="confirmUsername" id="idConfirm" onclick="getUsername(forgotUsername.value)" required>confirm username</button><br><br>
        <?php
    }
    else if($nb) {
        ?>
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" placeholder=<?php echo $username ?> disabled=false>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <label for="idSecurityCode">Security Code: </label>
        <input type="text" name="securityCode" id="idSC" value="" placeholder="Security Code">
        <span class="error">* <?php $securityCodeErr?> </span> <br><br>

        <button type="button" name="confirmSC" id="idConfirmSC" onclick="getSC(securityCode.value)">Submit</button>

        <button type="submit" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>
        <?php

    }
    ?>


</body>
</html>

