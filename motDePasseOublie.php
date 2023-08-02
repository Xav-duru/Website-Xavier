<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function changeButtonState() {
            var buttonPseudo = document.getElementsById('idValidePseudo')[0];
            var buttonSecurityCode = document.getElementById("idValideSecurityCode");

            // Disable the button on initial page load
            buttonSecurityCode.disabled = true;

            //add event listener
            buttonPseudo.addEventListener('idValidePseudo', function(event) {
                buttonSecurityCode.disabled = !buttonSecurityCode.disabled;
            });
        }
    </script>
    <?php include ('core.php'); ?>
</head>
<body>
    <?php
    $pseudoOublieErr = $securityCodeErr = "";
    

    if(isset($_POST['validePseudo'])){
        $pseudoOublie = $_POST['pseudoOublie'];
        
        $sql_pseudoOublie = "SELECT pseudo
        FROM Users 
        WHERE pseudo = '".$pseudoOublie."'";

        $result_pseudoOublie = $mysqli->query($sql_pseudoOublie);   
        echo $sql_pseudoOublie;
        $etatOublie = false;
        while ($row_pseudoOublie = $result_pseudoOublie->fetch_assoc()){
            $etatOublie = true;
        }
        if ($etatOublie) {
            changeButtonState()>;
        }
        else{ 
            $pseudoOublieErr = "Le pseudo n'existe pas";
        }
    }


    ?>

    <form method="post">
        <label for="idpseudo">Pseudo : </label>
        <input type="text" name="pseudoOublie" id="idPseudoOublie" value="" placeholder="Ton pseudo" required>
        <span class="error">* <?php echo $pseudoOublieErr?> </span><br><br>

        <input type="submit" name="validePseudo" id="idValidePseudo" value='Valider'><br><br>


        <label for="idSecurityCode">Code de sécurité : </label>
        <input type="text" name="securityCode" id="idSecurityCode" placeholder="Code De Sécurité" disabled>
        <span class="error">* <?php echo $securityCodeErr?> </span> <br><br>


        <input type="submit" name="valideSecurityCode" id="idValideSecurityCode" value='Valider' disabled><br><br>

        
    </form>
    
</body>
</html>