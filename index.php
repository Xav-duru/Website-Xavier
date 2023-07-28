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
    <h1>
        Salut, commence par te connecter !
    </h1>
        <form method="post">
            <input type="text" name="pseudo" id="pseudo" placeholder="Ton pseudo" require>
            <input type="password" name="password" id="password" placeholder="Mot de passe" require><br>
            <input type="submit" name="formsend" id="formsend">
            <?php
            /*
            if(!empty($pseudo) && !empty($password)){
                submit;
            }
            */
            ?>
        </form>

        <?php
        //La fonction real_escape_string, fonction de mysqli, protège les caractères spéciaux
        //d’une chaîne pour en permettre l’utilisation dans une requête SQL.
        $pseudoValidate = "xav";
        $passwordValidate = "azerty";
        if(isset($_POST['formsend'])){
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            if(!empty($pseudo) && !empty($password)){
                $pseudo_escaped = $mysqli->real_escape_string(trim($pseudo));
                $password_escaped = $mysqli->real_escape_string(trim($password));

                $sql = "SELECT idUsers
                FROM Users
                WHERE pseudo = '".$pseudo_escaped."'
                AND password = '".$password_escaped."'";

                $result = $mysqli->query($sql);
                $nb = $result->num_rows;

                if (!$result) {
                    exit($mysqli->error);
                }

                //$nb = $result->num_rows;
                else if($nb) { 
                    //récupération de l’id de l’étudiant
                    $row = $result->fetch_assoc();
                    $_SESSION['compte'] = $row['idEtu'];
                    $num = $row['idEtu'];
                    $mysqli->close();
                    header('location:page.php');
                }
            
                /*
                if($pseudo==$pseudoValidate && $password==$passwordValidate){
                    header('location:page.php');
                }
                echo "Le pseudo ou le mot de passe n'est pas valide";
                */
            } 
        }
        ?>
    </div>


</body>
</html>
