<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include ('../../../core.php'); ?>
    <?php include ('getPlayer.php'); ?>
</head>
<body>
    <?php
    $post=$_GET['post'];
    $player=$_GET['player'];
    $player_photo="photo_Players/".str_replace(" ","",$player).".png";

    ?>
    <div id='idBU'>
        <img src="<?php echo $player_photo ?>" style="width:50px; height:auto; border-radius: 70%;"><br>
        <a href="https://www.transfermarkt.com/pedri/profil/spieler/683840" target="_blank"><?php echo $player ?></a>
    </div>  
    
</body>
</html>