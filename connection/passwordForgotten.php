<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel='stylesheet' href='style_passwordForgotten.css'>
    <?php include ('core.php'); ?>
</head>
<body>
    <?php
    $forgotUsernameErr = $securityCodeErr = "";
    ?>

    <div class="passwordForgotten">
        <h1>Password forgotten ?</h1>
        <h2>Let's change it !</h2>
        <form id="myForm" method="post">
            <div id="username">
                <label for="idUsername">Username: </label>
                <input type="text" name="forgotUsername" id="idForgotUsername" value="" placeholder="Username" required>
                <span name="errorUsername" class="error">* <?php echo $forgotUsernameErr ?></span><br><br>

                <button type="button" name="confirmUsername" id="idConfirm" onclick="getUsername(forgotUsername.value)" required>Confirm username</button>

                <button type="button" name="cancel" id="idCancel" onclick="cancel()">Cancel</button><br><br>

                <label for="idSecurityCode">Security Code: </label>
                <input type="text" name="securityCode" id="idSC" value="" placeholder="Security Code" disabled>
                <span class="error">* <?php $securityCodeErr?> </span> <br><br>
            </div>
        </form>
    </div>


    <script>
    function getUsername(str){
        if (str == "") {        
            console.log(str);
            return;
        }

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            console.log(str);
            document.getElementById("username").innerHTML = this.responseText;
        }

        xhttp.open("GET", "databaseUsername.php?q="+str);
        xhttp.send();
    }

    function getSC(sc){
        if (sc == "") {        
            console.log(sc);
            return;
        }

        console.log(sc);
        const requestSC = new XMLHttpRequest();
        requestSC.onload = function() {
            console.log(sc);
            document.getElementById("username").innerHTML = this.responseText;
        }
        var username = document.getElementById("idForgotUsername").value;
        requestSC.open("GET", "databaseSC.php?u="+username+"&sc="+sc);
        requestSC.send();
    }

    function getPassword(newP, confirmP){
        if (newP == "" | confirmP == "") {        
            console.log(newP);
            console.log(confirmP);
            return;
        }

        console.log(newP);
        console.log(confirmP);
        const requestPassword = new XMLHttpRequest();
        requestPassword.onload = function() {
            document.getElementById("username").innerHTML = this.responseText;
        }
        var username = document.getElementById("idForgotUsername").value;
        requestPassword.open("GET", "databasePassword.php?u="+username+"&np="+newP+"&cnp="+confirmP);
        requestPassword.send();
    }
    function cancel() {
        window.history.back();
    }

    </script>
   
</body>
</html>