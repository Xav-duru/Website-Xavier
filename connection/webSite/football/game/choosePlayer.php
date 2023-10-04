<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose ton XI</title>
    <?php include ('../../../core.php'); ?>
    <?php include ('getPlayer.php'); ?>

</head> 
<body>

    <?php
        // Retourne l'ID du joueur parmis selon la ligue et le post
        
        $post=$_GET['post'];
        $league=$_GET['league']; 
        $numPost=getNumberPost($post);

        $player1 = getRandomPlayer($post, $league, $mysqli);
        $player1_name=getName($player1, $mysqli);
        $player1_price=getPrice($player1, $mysqli);
        $player1_photo="photo_Players/".str_replace(" ","",$player1_name).".png";

        $player2 = $player1;
        while ($player2 == $player1){
            $player2 = getRandomPlayer($post, $league, $mysqli);
        }
        $player2_name=getName($player2, $mysqli);
        $player2_price=getPrice($player2, $mysqli);
        $player2_photo=getPhoto($player2, $mysqli);
        $player2_photo="photo_Players/".str_replace(" ","",$player2_name).".png";


        $player3 = $player2;
        while ($player3 == $player2 || $player3 == $player1){
            $player3 = getRandomPlayer($post, $league, $mysqli);
        }
        $player3_name=getName($player3, $mysqli);
        $player3_price=getPrice($player3, $mysqli);
        $player3_photo=getPhoto($player3, $mysqli);
        $player3_photo="photo_Players/".str_replace(" ","",$player3_name).".png";

    ?>
    
    <div class="blockThreePlayer">
        <h1>Choose your </h1><h1 id="idCurrentPost"><?php echo $post ?></h1>
        <li>
            <img id="idPlayerPhoto" src=<?php echo $player1_photo ?>>
            <p id='idPlayer1_name'><?php echo $player1_name ?> </p>
            <h2> <?php echo $player1_price ?> M</h2>
            
            <button type="button" name="validPlayer1" id="idValidPlayer", value="<?php echo $player1_name ?>", onclick="showTeam(1)"><?php echo $player1_name ?></button>
        </li>
    
        <li>
            <img id="idPlayerPhoto" src=<?php echo $player2_photo ?>>
            <p id='idPlayer2_name'> <?php echo $player2_name ?></p>
            <h2> <?php echo $player2_price ?> M</h2>
            <button type="button" name="validPlayer2" id="idValidPlayer"onclick="showTeam(2)">Select</button>
        </li>

        <li>
            <img id="idPlayerPhoto" src=<?php echo $player3_photo ?>>
            <p id='idPlayer3_name'> <?php echo $player3_name ?></p>
            <h2> <?php echo $player3_price ?> M</h2>
            <button type="button" name="validPlayer3" id="idValidPlayer" onclick="showTeam(3)">Select</button>
        </li>
    </div>
    </body>
</html>