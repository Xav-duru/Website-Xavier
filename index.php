<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Xavier website</title>
    <link rel='stylesheet' href='css/style_index.css'>
    <script src='main.js'></script>
    <?php include ('core.php'); ?>

</head>
<body>
    <div class="connection">
        
        <?php
        if(isset($_POST['formsendConnection'])){
            $pseudoConnection = $_POST['pseudoConnection'];
            $passwordConnection = $_POST['passwordConnection'];
            if(!empty($pseudoConnection) && !empty($passwordConnection)){
                //La fonction real_escape_string, fonction de mysqli, protège les caractères spéciaux
                //d’une chaîne pour en permettre l’utilisation dans une requête SQL.
                $pseudo_escaped = $mysqli->real_escape_string(trim($pseudoConnection));
                $password_escaped = $mysqli->real_escape_string(trim($passwordConnection));
                
                $sql = "SELECT idUsers
                FROM Users
                WHERE pseudo = '".$pseudo_escaped."'
                AND password = '".$password_escaped."'";

                echo $sql;

                $result = $mysqli->query($sql);
                $nb = $result->num_rows;

                if (!$result) {
                    exit($mysqli->error);
                }
                //$nb = $result->num_rows;
                else if($nb) { 
                    //récupération de l’id du User
                    $row = $result->fetch_assoc();
                    $_SESSION['compte'] = $row['idUsers'];
                    $num = $row['idUsers'];
                    $mysqli->close();
                    header('location:page.php');
                }
            } 
            
        }
        ?>
        <h1>
            Salut, commence par te connecter !
        </h1>
        <form method="post">
            <input type="text" name="pseudoConnection" id="idPseudoConnection" value="" placeholder="Ton pseudo" required>
            <input type="password" name="passwordConnection" id="idPasswordConnection" placeholder="Mot de passe" value="" required><br>
            <input type="submit" name="formsendConnection" id="idFormsendConnection">
        </form>

    </div>
     
    <div class="creation">
        <?php
        $nameErr = $surnameErr = $genderErr = $pseudoErr = $passwordErr = $password2Err = $securityCodeErr ="";
        $name = $surname = $gender = $pseudo = $password = $password2 = $securityCode ="";

        if(isset($_POST['formsend'])){
            if(empty($_POST['name'])){ $nameErr = 'Name is required';}
            else{$name  = $_POST['name'];}

            if(empty($_POST['surname'])){ $surnameErr = 'Surname is required';}
            else{$surname  = $_POST['surname'];}

            if(empty($_POST['gender'])){ $genderErr = 'Gender is required';}
            else{$gender  = $_POST['gender'];}

            if(empty($_POST['pseudo'])){ 
                if(empty("SELECT * FROM Users WHERE pseudo = '$pseudo'")){
                    $pseudo = 'Pseudo is already used';
                }
                else{ 
                    $pseudo = 'Pseudo is required';
                }
            }
            else{
                $pseudo  = $_POST['pseudo'];
            }

            if(empty($_POST['password'])){ $passwordErr = 'Password is required';}
            else{$password  = $_POST['password'];}

            if($_POST['password2']!=$_POST['password']){ $password2Err = "passwords don't match";}
            else{$password2  = $_POST['password2'];}

            if(empty($_POST['securityCode'])){ $securityCodeErr = 'SecurityCode is required';}
            else{$securityCode  = $_POST['securityCode'];}

            $sql = "SELECT *
            FROM Users";

            if($nameErr =="" && $surnameErr =="" && $genderErr =="" && $pseudoErr =="" && $passwordErr =="" && $password2Err =="" && $securityCodeErr ==""){
                $last_id = $mysqli->insert_id;
                echo $last_id;
                //"INSERT INTO Users VALUES(($nbLignes+1), $surname, $name, $pseudo, $password, $securityCode)";
            }  
        }
        ?>
        <h1>
            Première fois ? Inscrit toi !
        </h1>   
        <form method="post">
            <label for="idName">Prénom : </label>
            <input type="text" name="name" id="idName" placeholder="Prénom">
            <span class="error">* <?php echo $nameErr?> </span>
            <br><br>

            <label for="idSurname">Nom : </label>
            <input type="text" name="surname" id="idSurname" placeholder="Nom">
            <span class="error">* <?php echo $surnameErr?> </span>
            <br><br>

            <label for="idGender">Genre : </label>
            <input type="radio" name="gender" value="female">Femme
            <input type="radio" name="gender" value="male">Homme
            <span class="error">* <?php echo $genderErr;?></span>
            <br><br>

            <label for="idpseudo">Pseudo : </label>
            <input type="text" name="pseudo" id="idPseudo" placeholder="Pseudo">
            <span class="error">* <?php echo $pseudoErr?> </span>
            <br><br>

            <label for="idpassword">Mot de passe : </label>
            <input type="password" name="password" id="idPassword" placeholder="Mot De Passe">
            <span class="error">* <?php echo $passwordErr?> </span>
            <br><br>

            <label for="idPassword2">Rentre à nouveau ton mot de passe : </label><br>
            <input type="password" name="password2" id="idPassword2" placeholder="Mot De Passe">
            <span class="error">* <?php echo $password2Err?> </span>
            <br><br>

            <label for="idSecurityCode">Entre de code de sécurité en cas d'oubli de mot de passe : </label><br>
            <input type="text" name="securityCode" id="idSecurityCode" placeholder="Code De Sécurité">
            <span class="error">* <?php echo $securityCodeErr?> </span>
            <br><br>

            <label for="idFormsend">Valide ton inscription</label><br>
            <input type="submit" name="formsend" id="idFormsendConnection">
            <br><br>
        </form>

        
    </div>


</body>
</html>
