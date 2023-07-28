<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Xavier website</title>
    <link rel='stylesheet' href='css/style_index.css'>
    <script src='main.js'></script>
</head>
<body>
    <header>
        <h1>
            Salut, commence par te connecter !
        </h1>
    </header>
    <div class = "mainbox">
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
    </div>
    
    <?php
    $psuedoValidate = "xav";
    $passwordValidate = "azerty";
    if(isset($_POST['formsend'])){
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        if(!empty($pseudo) && !empty($password)){
            if($pseudo==$psuedoValidate && $password==$passwordValidate){
                header('location:page.php');
            }
            echo "Le pseudo ou le mot de passe n'est pas valide";
        }
        
    }
    
    ?>


</body>
</html>
