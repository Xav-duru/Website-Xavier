<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Xavier's website</title>
    <link rel='stylesheet' href='style_index.css'>
    <?php include ('core.php'); ?>

</head>
<body>
    <div class='title'>
        <h1>
            Welcome to Xavier's website
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
                    WHERE username = '".$pseudo_escaped."'
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
                        header('location:webSite/page.php');
                    }
                } 
                
            }
            ?>
            <h1>
                Log in
            </h1>
            <form method="post">
                <div id="goldFrame">
                <p>Log in information</p>

                <label for="idpseudo">Username: </label>
                <input type="text" autocomplete="on" name="pseudoConnection" id="idPseudoConnection" value="" placeholder="Username" required><br><br>

                <label for="idpassword">Password: </label>
                <input type="password" autocomplete="off" name="passwordConnection" id="idPasswordConnection" placeholder="Password" value="" required><br><br>
                </div>

                <input type="submit" name="formsendConnection" id="idFormsendConnection" value="Submit"><br><br>

                <a href="passwordForgotten.php" target="_blank">
                    Forgot your password?
                </a>
            </form>

        </div>
        
        <div class="registration">
            <?php
            $nameErr = $surnameErr = $genderErr = $pseudoErr = $passwordErr = $password2Err = $questionSecurityCodeErr = $securityCodeErr ="";
            $name = $surname = $gender = $pseudo = $password = $password2 = $questionSecurityCode = $securityCode ="";
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
                    $sql_pseudo = "SELECT username
                    FROM Users 
                    WHERE username = '".$_POST['pseudo']."'";

                    $result_pseudo = $mysqli->query($sql_pseudo);   
                    $state = true;
                    while ($row_pseudo = $result_pseudo->fetch_assoc()){
                        $state = false;
                    }
                    if ($state) { 
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

                if(($_POST['questionSecurityCode'])=='optionDefaut'){ $questionSecurityCodeErr = 'Question for security code is required';}
                else{$questionSecurityCode  = $_POST['questionSecurityCode'];}

                if(empty($_POST['securityCode'])){ $securityCodeErr = 'SecurityCode is required';}
                else{$securityCode = $_POST['securityCode'];}

                /**
                 * Lorsque tous les champs ont été correctement rempli, et que le bouton Soumettre a été appuyé, on cherche à ajouter
                 * l'utilisateur dans la BDD.
                 */
                if($nameErr =="" && $surnameErr =="" && $genderErr =="" && $pseudoErr =="" && $passwordErr =="" && $password2Err =="" && $questionSecurityCodeErr =="" && $securityCodeErr ==""){
                
                    $sql_count = "SELECT idUsers
                    FROM Users";

                    $result_count = $mysqli->query($sql_count);

                    //Récupère le nombre de ligne dont le résultat est vrai
                    $nb_count = $result_count->num_rows;

                    //On fait +1 pour ajouter le nouvel utilisateur à la ligne suivante
                    $nb_add = $nb_count+1;
                    
                    $sql_add = "INSERT INTO Users (idUsers, surname, name, username, password, questionSecurityCode, securityCode)
                    VALUES('$nb_add', '$surname', '$name', '$pseudo', '$password', '$questionSecurityCode', '$securityCode')";
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
                Registration
            </h1>   
            <form method="post">

                <div id="blueFrame">
                <p>Personal information</p>

                <label for="idName">Name: </label>
                <input type="text" name="name" id="idName" placeholder="Name">
                <span class="error">* <?php echo $nameErr?> </span>
                <br><br>

                <label for="idSurname">Surname: </label>
                <input type="text" name="surname" id="idSurname" placeholder="Surname">
                <span class="error">* <?php echo $surnameErr?> </span>
                <br><br>

                <label for="idGender">Gender: </label>
                <input type="radio" name="gender" value="female" checked>Women
                <input type="radio" name="gender" value="male">Men
                <span class="error">* <?php echo $genderErr;?></span>
                <br><br>

                <label for="idpseudo">Username: </label>
                <input type="text" name="pseudo" id="idPseudo" placeholder="Username">
                <span class="error">* <?php echo $pseudoErr?> </span>
                <br><br>
                </div>

                

                <div id="blueFrame">
                <p>Password</p>
                <label for="idpassword">Password: </label>
                <input type="password" name="password" id="idPassword" placeholder="Password">
                <span class="error">* <?php echo $passwordErr?> </span>
                <br><br>

                <label for="idPassword2">Enter your password again: </label>
                <input type="password" name="password2" id="idPassword2" placeholder="Password">
                <span class="error">* <?php echo $password2Err?> </span>
                <br><br>
                </div>

            

                <div id="blueFrame">
                <p>Security code in case of forgotten password</p>

                <label for="questionSecurityCode">Select a question: </label>
                <select id="idQuestionSecurityCode" name="questionSecurityCode">
                    <option value="optionDefaut">Select a question</option>
                    <option value="What is your best friend's birthday?">What is your best friend's birthday?</option>
                    <option value="What is your favorite animal?">What is your favorite animal?</option>
                    <option value="Who is your favorite athlete">Who is your favorite athlete</option>
                    <option value="What is your first car?">What is your first car?</option>
                    <option value="What is your mother's favourite song?">What is your mother's favourite song?</option>
                    <option value="Who is your favorite person">Who is your favorite person</option>

                </select> 
                <span class="error">* <?php echo $questionSecurityCodeErr ?> </span>
                <br><br>


                <label for="idSecurityCode">Answer: </label>
                <input type="text" name="securityCode" id="idSecurityCode" placeholder="Security Code">
                <span class="error">* <?php echo $securityCodeErr?> </span>
                <br><br>
                </div>

                <input type="submit" name="formsend" id="idFormsendConnection" value="Submit">
                <br><br>

                <?php echo $confirmeCreation?>

            </form>
        </div>

        
    </div>


</body>
</html>
