<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $passwordErr = $forgotUsernameErr = "";
    ?>

    <form class="passwordForgotten" method="post">
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="" placeholder="Username" disabled>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <div id="SC">
            <label for="idSecurityCode">Security Code: </label>
            <input type="text" name="securityCode" id="idSC" placeholder="Security Code" disabled>
            <span class="error"> <?php $securityCodeErr?> </span> <br><br>

            <label for="idPassword">Password: </label>
            <input type="password" name="password" id="idPassword" placeholder="Password">
            <span class="error"> <?php $passwordErr?> </span> <br><br>

            <button type="submit" name="confirmSecurityCode" id="idConfirmSC" onclick=getSC(securityCode.value)>Submit</button>

            <button type="submit" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>
        </div>
    </form>
</body>
</html>