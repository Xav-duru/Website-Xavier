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
    $securityCodeErr = $forgotUsernameErr = "";

    $username = urldecode($_GET['username']);
    echo "coucou";

    ?>

    <form class="passwordForgotten" method="post">
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" placeholder=<?php echo $username ?> disabled=false>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <div id="SC">
            <label for="idSecurityCode">Security Code: </label>
            <input type="text" name="securityCode" id="idSC" value="" placeholder="Security Code">
            <span class="error">* <?php $securityCodeErr?> </span> <br><br>

            <button type="button" name="confirmSC" id="idConfirmSC" >Submit</button>

            <button type="submit" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>

        </div>
    </form>


    <script>
        console.log('essai');

    function getSC(sc){
        console.log(sc);
        if (sc == "") {        
            console.log(sc);
            return;
        }

        console.log(sc);
        const requestSC = new XMLHttpRequest();
        requestSC.onload = function() {
            console.log(sc);
            document.getElementById("SC").innerHTML = this.responseText;
        }

        requestSC.open("GET", "databaseSC.php");
        requestSC.send();
    }

    function cancel(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("SC").innerHTML = this.responseText;
        }
        xhttp.open("GET", "passwordForgotten.php");
        xhttp.send();

    }

    </script>
   
</body>
</html>