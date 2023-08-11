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

    $sql_SC = "SELECT securityCode
    FROM Users
    WHERE username = ?";

    $sCode=$_GET['sc'];
    echo $sCode;

    $username=$_GET['u'];
    echo $username;

    $stmt2 = $mysqli->prepare($sql_SC);
    $stmt2->bind_param("s", $username);
    $stmt2->execute();

    foreach ($stmt2 as $row) {
        print_r($row);

/*
    $result = $stmt2->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    */
    
    $numSC = $row['securityCode'];

    echo $numSC;

    //$nb2 = $stmt2->num_rows;  
    //echo $nb2;

    if ($numSC != $sCode) { 
        $securityCodeErr = "The security code does not exist";
        ?>
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="<?php echo $username ?>" placeholder=<?php echo $username ?> disabled=false>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <label for="idSecurityCode">Security Code: </label>
        <input type="text" name="securityCode" id="idSC" value="" placeholder="Security Code">
        <span class="error">* <?php $securityCodeErr?> </span> <br><br>

        <button type="button" name="confirmSC" id="idConfirmSC" onclick="getSC(securityCode.value)">Submit</button>

        <button type="submit" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>
        <?php
    }
    else if($numSC == $sCode) {
        ?>
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="<?php echo $username ?>" placeholder=<?php echo $username ?> disabled=false>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <label for="idSecurityCode">Security Code: </label>
        <input type="text" name="securityCode" id="idSC" value="" placeholder=<?php echo $sCode ?> disabled=false>
        <span class="error">* <?php $securityCodeErr?> </span> <br><br>

        <label for="idNewPassword">New password: </label>
        <input type="newPassword" name="newPassword" id="idNewPassword" value="" placeholder='New password'><br><br>

        <label for="idConfirmNewPassword">Confirm new password: </label>
        <input type="password" name="confirmNewPassword" id="idConfirmNewPassword" value="" placeholder='Confirm new password'>
        <span class="error">* <?php $newPasswordErr?> </span> <br><br>

        <button type="button" name="confirmSC" id="idConfirmSC" onclick="getSC(securityCode.value)">Submit</button>

        <button type="submit" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>
        <?php
    }
    }
    
    ?>
</body>
</html>

