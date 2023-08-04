<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include ('core.php'); ?>
    <script type="text/javascript" src='motDePasseOublie.js' defer></script>
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
        $etatOublie = false;
        
        while ($row_pseudoOublie = $result_pseudoOublie->fetch_assoc()){
            $etatOublie = true;
        }
        if ($etatOublie) {
            echo "coucou";
            $securityCode="Code de sécurité : ";
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

        <input type="submit" name="validePseudo" id="idValidePseudoOublie" onclick="Onload()" class=classSubmit value='Valider le pseudo'><br><br>

        <label for="idSecurityCode">Code de sécurité : </label>
        <input type="submit" name="securityCode" id="idSC" placeholder="Code De Sécurité" disabled>
        <span class="error"> <?php $securityCodeErr?> </span> <br><br>

        <input type="submit" name="valideSecurityCode" id="idValideSSC" value='Valider la clé de sécurité' disabled><br><br>
    </form>
   
</body>
</html>