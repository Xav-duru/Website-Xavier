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

                <button type="button" name="confirmUsername" id="idConfirm" onclick="getUsername(forgotUsername.value)" required>confirm username</button><br><br>
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
    </script>
   
</body>
</html>