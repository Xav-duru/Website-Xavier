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

    $username=$_GET['u'];
    $newPassword=$_GET['np'];
    $confirmNewPassword=$_GET['cnp'];

    $sql_oldPassword = "SELECT password
    FROM Users
    WHERE username = '".$username."'";

    $result_oldP = $mysqli->query($sql_oldPassword);
    $row_oldP = $result_oldP->fetch_assoc();
    $num_oldP = $row_oldP['password'];

    if($newPassword == $confirmNewPassword){
        $sql_newPassword = "UPDATE Users 
        SET password = '".$newPassword."'
        WHERE username = '".$username."'";
        $mysqli->query($sql_newPassword);

        ?>
        <p id="questionSC"> The password has been successfully changed ! </p>
        <a href="index.php" id="linkHomePage">
            Return to home page
        </a>
        <br/><br/><br/>


        <?php
    }

    else{
        $newPasswordErr="Passwords do not match"
        ?>
        <br>
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="<?php echo $username ?>" placeholder=<?php echo $username ?> disabled=false>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <label for="idSecurityCode">Security Code: </label>
        <input type="text" name="securityCode" id="idSC" value="" disabled=false>
        <span class="error">* <?php $securityCodeErr?> </span> <br><br>

        <label for="idNewPassword">New password: </label>
        <input type="newPassword" name="newPassword" id="idNewPassword" value="" placeholder='New password'><br><br>

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

