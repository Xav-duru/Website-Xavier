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

    ?>

    <form class="passwordForgotten" method="post">
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" placeholder=<?php echo $username ?> disabled=false>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <div id="SC">
            <label for="idSecurityCode">Security Code: </label>
            <input type="text" name="securityCode" id="idSC" value="" placeholder="Security Code">
            <span class="error">* <?php $securityCodeErr?> </span> <br><br>

            <button type="button" name="confirmSecurityCode" id="idConfirmSC" onclick=getSC(securityCode.value)>Submit</button>

            <button type="submit" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>

        </div>
    </form>


    <script>
    
  

    function getSC(SC){
        console.log(SC);
        if (SC == "") {        
            console.log(SC);
            return;
        }

        console.log(SC);
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            console.log(SC);
            document.getElementById("SC").innerHTML = this.responseText;
        }

        xhttp.open("GET", "databaseSC.php");
        xhttp.send();
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