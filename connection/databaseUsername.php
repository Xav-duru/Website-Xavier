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
    
    $sql_forgotUsername = "SELECT username
    FROM Users
    WHERE username = ?";

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
        <br>
        <label for="idUsername">Username : </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="" placeholder="Username" required>
        <span name="errorUsername" class="error">* <?php echo $forgotUsernameErr ?></span><br><br>

        <button type="button" name="confirmUsername" id="idConfirm" onclick="getUsername(forgotUsername.value)" required>Confirm username</button>
        
        <button type="button" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>

        <?php
    }
    else if($nb) {
        $sql_questionSC = "SELECT questionSecurityCode
        FROM Users
        WHERE username = '".$username."'";

        $result_questionSC = $mysqli->query($sql_questionSC);
        $row_questionSC = $result_questionSC->fetch_assoc();
        $num_questionSC = $row_questionSC['questionSecurityCode'];

        ?>
        <br>
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="<?php echo $username ?>" placeholder=<?php echo $username ?> disabled=false>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br>

        <p id="questionSC"> <?php echo $num_questionSC ?> </p>

        <label for="idSecurityCode">Security Code: </label>
        <input type="text" name="securityCode" id="idSC" value="" placeholder="Security Code">
        <span class="error">* <?php $securityCodeErr?> </span> <br><br>

        <button type="button" name="confirmSC" id="idConfirmSC" onclick="getSC(securityCode.value)">Confirm security code</button>

        <button type="button" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>
        <?php

    }
    ?>


</body>
</html>

