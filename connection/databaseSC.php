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
    $securityCodeErr = $forgotUsernameErr = $newPasswordErr = "";

    /*
    $sql_SC = "SELECT securityCode
    FROM Users
    WHERE username = ?";
    */

    $sCode=$_GET['sc'];
    //echo $sCode;

    $username=$_GET['u'];
    //echo $username;

    $sql_questionSC = "SELECT questionSecurityCode
    FROM Users
    WHERE username = '".$username."'";

    $result_questionSC = $mysqli->query($sql_questionSC);
    $row_questionSC = $result_questionSC->fetch_assoc();
    $num_questionSC = $row_questionSC['questionSecurityCode'];

    $sql_SC = "SELECT securityCode
    FROM Users
    WHERE username = '".$username."'";

    $result_SC = $mysqli->query($sql_SC);
    $row_SC = $result_SC->fetch_assoc();
    $num_SC = $row_SC['securityCode'];

    //echo $num_SC;

    if ($num_SC != $sCode) { 
        $securityCodeErr = "The security code does not exist";
        ?>
        <br>
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="<?php echo $username ?>" placeholder=<?php echo $username ?> disabled=false>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br>

        <p id="questionSC"> <?php echo $num_questionSC ?> </p>

        <label for="idSecurityCode">Security Code: </label>
        <input type="text" name="securityCode" id="idSC" value="" placeholder="Security Code">
        <span class="error">* <?php echo $securityCodeErr?> </span> <br><br>

        <button type="button" name="confirmSC" id="idConfirmSC" onclick="getSC(securityCode.value)">Confirm security code</button>

        <button type="submit" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>
        <?php
    }
    else if($num_SC == $sCode) {
        ?>
        <br>
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="<?php echo $username ?>" placeholder=<?php echo $username ?> disabled=false>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <label for="idSecurityCode">Security Code: </label>
        <input type="text" name="securityCode" id="idSC" value="" placeholder=<?php echo $sCode ?> disabled=false>
        <span class="error">* <?php $securityCodeErr?> </span> <br><br>

        <label for="idNewPassword">New password: </label>
        <input type="password" name="newPassword" id="idNewPassword" value="" placeholder='New password'><br><br>

        <label for="idConfirmNewPassword">Confirm new password: </label>
        <input type="password" name="confirmNewPassword" id="idConfirmNewPassword" value="" placeholder='Confirm new password'>
        <span class="error">* <?php $newPasswordErr?> </span> <br><br>

        <button type="button" name="confirmPassword" id="idConfirmPassword" onclick="getPassword(newPassword.value, confirmNewPassword.value)">Confirm password</button>

        <button type="submit" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>
        <?php
    }
    
    
    ?>
</body>
</html>

