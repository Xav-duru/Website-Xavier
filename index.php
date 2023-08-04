<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Xavier website</title>
    <link rel='stylesheet' href='css/style_index.css'>
    <?php include ('core.php'); ?>

</head>
<body>
    <div class='title'>
        <h1>
            Bienvenue sur le site de Xavier
        </h1>
    </div>
    <div class="mainbox">
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

                    $result = $mysqli->query($sql);

                    //Récupère le nombre de ligne dont le résultat est vrai
                    $nb = $result->num_rows;

                    if (!$result) { 
                        exit($mysqli->error);
                    }
                    else if($nb) { 
                        //Créé un tableau avec les différentes valeurs
                        $row = $result->fetch_assoc();

                        //Récupère la session de l'id de l'utilisateur
                        $_SESSION['compte'] = $row['idUsers'];

                        //Récupère le numéro de l'id de l'utilisateur
                        $num = $row['idUsers'];
                        echo $num;?><br><?php

                        $mysqli->close();
                        header('location:page.php');
                    }
                } 
                
            }
            ?>
            <h1>
                Connection
            </h1>
            <form method="post">
                <label for="idpseudo">Pseudo : </label>
                <input type="text" autocomplete="on" name="pseudoConnection" id="idPseudoConnection" value="" placeholder="Ton pseudo" required><br><br>

                <label for="idpassword">Mot de passe : </label>
                <input type="password" autocomplete="off" name="passwordConnection" id="idPasswordConnection" placeholder="Mot de passe" value="" required><br><br>
                
                <input type="submit" name="formsendConnection" id="idFormsendConnection"><br><br>

                <a href="motDePasseOublie.php" target="_blank">
                    Mot de passe oublié ?
                </a>
            </form>

        </div>
        
        <div class="creation">
            <?php
            $nameErr = $surnameErr = $genderErr = $pseudoErr = $passwordErr = $password2Err = $securityCodeErr ="";
            $name = $surname = $gender = $pseudo = $password = $password2 = $securityCode ="";
            $confirmeCreation = "";

            if(isset($_POST['formsend'])){
                if(empty($_POST['name'])){ $nameErr = 'Name is required';}
                else{$name  = $_POST['name'];}

                if(empty($_POST['surname'])){ $surnameErr = 'Surname is required';}
                else{$surname  = $_POST['surname'];}

                if(empty($_POST['gender'])){ $genderErr = 'Gender is required';}
                else{$gender  = $_POST['gender'];}

                if(empty($_POST['pseudo'])){ $pseudoErr = 'Pseudo is required';}
                else{
                    /**
                     * On cherche à vérifier que le pseudo n'est pas déja utilisé
                     */
                    $sql_pseudo = "SELECT pseudo
                    FROM Users 
                    WHERE pseudo = '".$_POST['pseudo']."'";

                    $result_pseudo = $mysqli->query($sql_pseudo);   
                    $etat = true;
                    while ($row_pseudo = $result_pseudo->fetch_assoc()){
                        $etat = false;
                    }
                    if ($etat) { 
                        $pseudo  = $_POST['pseudo'];
                    }
                    else{ 
                        $pseudoErr = 'Pseudo is already used';
                    }
                }

                if(empty($_POST['password'])){ $passwordErr = 'Password is required';}
                else{$password  = $_POST['password'];}

                if($_POST['password2']!=$_POST['password']){ $password2Err = "passwords don't match";}
                else{$password2  = $_POST['password2'];}

                if(empty($_POST['securityCode'])){ $securityCodeErr = 'SecurityCode is required';}
                else{$securityCode  = $_POST['securityCode'];}

                /**
                 * Lorsque tous les champs ont été correctement rempli, et que le bouton Soumettre a été appuyé, on cherche à ajouter
                 * l'utilisateur dans la BDD.
                 */
                if($nameErr =="" && $surnameErr =="" && $genderErr =="" && $pseudoErr =="" && $passwordErr =="" && $password2Err =="" && $securityCodeErr ==""){
                
                    $sql_count = "SELECT idUsers
                    FROM Users";

                    $result_count = $mysqli->query($sql_count);

                    //Récupère le nombre de ligne dont le résultat est vrai
                    $nb_count = $result_count->num_rows;

                    //On fait +1 pour ajouter le nouvel utilisateur à la ligne suivante
                    $nb_ajout = $nb_count+1;
                    
                    $sql_add = "INSERT INTO Users (idUsers, surname, name, pseudo, password, securityCode)
                    VALUES('$nb_ajout', '$surname', '$name', '$pseudo', '$password', '$securityCode')";
                    if (mysqli_query($mysqli, $sql_add)) {
                        $confirmeCreation = 'Bravo ! Ton compte a bien été créé !';
                    } 
                    else {
                        echo "Erreur : " . $sql_add . "<br>" . mysqli_error($mysqli);
                    }

                }  
            }
            
            ?>
            <h1>
                Inscription
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

                <label for="idFormsend">Valide ton inscription :</label><br>
                <input type="submit" name="formsend" id="idFormsendConnection">
                <br>

                <?php echo $confirmeCreation?>

            </form>
        </div>

        
    </div>


</body>
</html>
