<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiteWeb Xavier</title>
</head>
<body>
    <form method="post">
        <input type="text" name="pseudo" id="pseudo" placeholder="Ton pseudo" require>
        <input type="password" name="password" id="password" placeholder="Mot de passe" require>
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
    $psuedoValidate = "xav";
    $passwordValidate = "azerty";
    if(isset($_POST['formsend']) && (!empty($_POST['pseudo']))){
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        header('location:page.php');
        /*
        if(!empty($pseudo) && !empty($password)){
            if($pseudo==$psuedoValidate && $password==$passwordValidate){
                echo "Bienvenue " . $pseudo . " !";
            }
            echo "Bienvenue " . $pseudo . " !";
        }
        */
    }
    
    ?>


</body>
</html>
