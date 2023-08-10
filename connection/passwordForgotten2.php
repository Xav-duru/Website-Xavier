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

    <form class="passwordForgotten" method="post">
        <label for="idUsername">Username: </label>
        <input type="text" name="forgotUsername" id="idForgotUsername" value="" placeholder="Username" disabled>
        <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

        <div id="SC">
            <label for="idSecurityCode">Security Code: </label>
            <input type="text" name="securityCode" id="idSC" placeholder="Security Code" required>
            <span class="error"> <?php $securityCodeErr?> </span> <br><br>

            <button type="submit" name="confirmSecurityCode" id="idConfirmSC" onclick=getSC(securityCode.value)>Submit</button>

            <button type="submit" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>
        </div>
    </form>


    <script>
    var { userID } = require('./passwordForgotten.php');
    function getSC(SC){
        if (SC == "") {        
            console.log(SC);
            return;
        }

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            module.exports = { userID : 'str' };
            copnsole.log(module.exports);
            console.log(SC);
            document.getElementById("SC").innerHTML = this.responseText;
        }

        xhttp.open("GET", "databaseSC.php?q="+SC"&r="+);
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