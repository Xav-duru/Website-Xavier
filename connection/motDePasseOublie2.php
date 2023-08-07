<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <?php include ('core.php'); ?>
</head>
<body>
    <?php
    $forgotUsernameErr = $securityCodeErr = "";

    ?>

    <form method="post">
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="" placeholder="Username" disabled>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <input type="button" name="confirmUsername" id="idConfirmForgotUsername" value='Confirm username' disabled><br><br>

        <label for="idSecurityCode">Security Code: </label>
        <input type="text" name="securityCode" id="idSC" placeholder="Security Code">
        <span class="error"> <?php $securityCodeErr?> </span> <br><br>

        <button type="submit" name="confirmSecurityCode" id="idConfirmSC" onclick="loadDoc2()">Submit</button>

        <button type="submit" name="cancel" id="idCancel" onclick="motDePasseOublie()">Cancel</button><br><br>
    </form>


    <script>
    const inputUsername = document.getElementById('idForgotUsername');
    const btnUsername = document.getElementById('idConfirmForgotUsername');
    const inputSC = document.getElementById('idSC');
    const btnSC = document.getElementById('idConfirmSC');


    function loadDoc2() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            console.log("terminer");
        }
        xhttp.open("GET", "index.php");
        xhttp.send();
    }

    function cancel(){
        xhttp.onload = function() {
            console.log("cancel");
        }
        xhttp.open("GET", "motDePasseOublie2.php");
        xhttp.send();
    }
    </script>
   
</body>
</html>