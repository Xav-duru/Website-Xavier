<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $pseudoOublieErr = $securityCodeErr = "";
    

    if(isset($_POST['validePseudo'])){
        $pseudo = $_POST['validePseudo'];
        
        $sql_pseudo = "SELECT pseudo
        FROM Users 
        WHERE pseudo = '".$pseudo."'";

        $result_pseudo = $mysqli->query($sql_pseudo);   
        $etat = true;
        while ($row_pseudo = $result_pseudo->fetch_assoc()){
            $etat = false;
        }
        if ($etat) { 
            $pseudoOublieErr = "Le pseudo n'existe pas";
        }
        else{ 
            pseudoOublie.prop("disabled", true);
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