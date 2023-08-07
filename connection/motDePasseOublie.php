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
    $state="";
    
    if(isset($_POST['confirmUsername'])){
        $forgotUsername = $_POST['forgotUsername'];
        
        $sql_forgotUsername = "SELECT pseudo
        FROM Users 
        WHERE pseudo = '".$forgotUsername."'";

        $result_forgotUsername = $mysqli->query($sql_forgotUsername);
        echo "";
        
        while ($row_forgotUsername = $result_forgotUsername->fetch_assoc()){
            $state = "present";
        }
        if ($state!="") {
            $securityCode="Security Code: ";
        }
        else{ 
            $forgotUsernameErr = "The username doesn't exist";
        }       
    }


    ?>

    <form id="myForm" method="post">
        <p id="result">Form</p>
        <div id="username">
            <label for="idUsername">Username : </label>
            <input type="text" name="forgotUsername" id="idForgotUsername" value="" placeholder="Username" required>
            <span class="error">* <?php echo $forgotUsernameErr?> </span><br><br>

            <button type="submit" name="confirmUsername" id="idConfirmForgotUsername" onclick="submitForm(event)">Submit</button><br><br>
        </div>
    </form>


    <script>
        var myForm = document.getElementById("myForm");
        var result = document.getElementById("result");
        function submitForm(event) {
            event.preventDefault();
            myForm.submit();
            result.innerHTML = "<b>Form completed.</b>"
            console.log("essai")
            loadDoc();

        }

    const inputUsername = document.getElementById('idForgotUsername');
    const btnUsername = document.getElementById('idConfirmForgotUsername');
    const username = document.getElementById('username');

    function loadDoc() {
        const xhttp = new XMLHttpRequest();
        console.log("essai3")
        xhttp.onload = function() {
            let value=document.getElementById('idForgotUsername').value;
            let state=document.getElementById('state').innerHTML;
            console.log(value)
            console.log(state)
            username.innerHTML = this.responseText;
        }
        console.log("essai")
        xhttp.open("GET", "motDePasseOublie2.php");
        console.log("essai2")
        xhttp.send();
    }
    </script>
   
</body>
</html>