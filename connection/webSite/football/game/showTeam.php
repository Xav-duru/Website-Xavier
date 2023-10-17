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
    $player_name=$_GET['player'];
    $player_name_normal=trim($player_name);
    $player_name_form=getGoodForm($player_name);
    $player_firstName=getGoodForm(getFirstNameByName($player_name, $mysqli));
    echo $player_firstName;
    $player_photo="photo_Players/".str_replace(" ","",$player_name).".png";
    $player_refTM=getRefTM($player_name, $mysqli);
    $linkTM="https://www.transfermarkt.com/".$player_firstName."-".$player_name."/profil/spieler/".$player_refTM;
    echo $linkTM;?><br><?php
    echo "https://www.transfermarkt.com/terem-moffi/profil/spieler/538874";

    switch($post){
        case("ST"):
        ?>
        <div id='idST'>
            <img src="<?php echo $player_photo ?>" style="width:50px; height:auto; border-radius: 70%;"><br>
            <a href="<?php echo $linkTM ?>" target="_blank"><?php echo $player_name_normal ?></a>
        </div>
        <?php
        break;
        case("COM"):
        ?>
        <div id='idCOM'>
            <img src="<?php echo $player_photo ?>" style="width:50px; height:auto; border-radius: 70%;"><br>
            <a href=<?php $linkTM ?> target="_blank"><?php echo $player_name ?></a>
        </div>
        <?php
        break;
        case("GK"):
            ?>
            <div id='idGK'>
                <img src="<?php echo $player_photo ?>" style="width:50px; height:auto; border-radius: 70%;"><br>
                <a href=<?php $linkTM ?> target="_blank"><?php echo $player_name ?></a>
            </div>
            <?php
            break;
        case("LB"):
            ?>
            <div id='idLB'>
                <img src="<?php echo $player_photo ?>" style="width:50px; height:auto; border-radius: 70%;"><br>
                <a href=<?php $linkTM ?> target="_blank"><?php echo $player_name ?></a>
            </div>
            <?php
            break;
        case("COM"):
            ?>
                <div id='idCOM'>
                <img src="<?php echo $player_photo ?>" style="width:50px; height:auto; border-radius: 70%;"><br>
                <a href=<?php $linkTM ?> target="_blank"><?php echo $player_name ?></a>
            </div>
            <?php
            break;
        case("COM"):
            ?>
            <div id='idCOM'>
                <img src="<?php echo $player_photo ?>" style="width:50px; height:auto; border-radius: 70%;"><br>
                <a href=<?php $linkTM ?> target="_blank"><?php echo $player_name ?></a>
            </div>
            <?php
            break;
        case("COM"):
            ?>
            <div id='idCOM'>
                <img src="<?php echo $player_photo ?>" style="width:50px; height:auto; border-radius: 70%;"><br>
                <a href=<?php $linkTM ?> target="_blank"><?php echo $player_name ?></a>
            </div>
            <?php
            break;
        default:
            break;
    }
    ?>
    
    
</body>
</html>