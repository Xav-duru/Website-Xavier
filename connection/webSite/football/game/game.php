<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='game.css'>
    <title>Compose ton XI</title>
    <?php include ('../../../core.php'); ?>
</head>
<body>
    <div id="twoBoxes">
      
    <div class="leftBox">
        <?php
        if(isset($_GET['submitParameters'])){
            $sold = $_GET['sold'];
            $league = $_GET['league'];
            $league = str_replace(" ","",$league);
            echo $sold;
            header('Location: play.php?sold='.$sold.'&league='.$league);
        }
        ?>

        <h1> Let's play draft! </h1>
    
        <form id="parameters" method="get">
            <p>Choose parameters</p>

            <label for="sold">Sold: </label>
            <select id="idSold" name="sold">
                <option value="50M">50M</option>
                <option value="100M">100M</option>
                <option value="150M">150M</option>
                <option value="200M">200M</option>
                <option selected value="250M">250M</option>
                <option value="300M">300M</option>
                <option value="350M">350M</option>
                <option value="400M">400M</option>
                <option value="450M">450M</option>
                <option value="500M">500M</option>
            </select> 
            <br><br>

            <label for="league">Choose your league: </label>
            <select id="idLeague" name="league">
                <option value="Ligue 1" default>Ligue 1</option>
                <option value="Premier League">Premier League</option>
                <option value="Liga">Liga</option>
                <option value="Serie A">Serie A</option>
                <option value="Bundesliga">Bundesliga</option>
                <option value="All">all of them</option>
            </select> 
            <br><br>

            <input type="submit" name="submitParameters" id="idsubmitParameters" value="Submit"><br><br>
        </form>        
    </div>

    <div class='rightBox'>
        <?php 
        if(isset($_POST['formsend'])){
            if($_POST['name'] !="" && $_POST['price'] !=""  && $_POST['nation'] !=""  && $_POST['club'] !=""  && $_POST['refTransferMarket'] !=""){
                    
                $name=$_POST['name'];
                $price=$_POST['price'];
                $league=str_replace(" ","",$_POST['league']);
                $post=$_POST['post'];
                $nation=$_POST['nation'];
                $club=$_POST['club'];
                $refTransferMarket=$_POST['refTransferMarket'];

                $sql_count = "SELECT id
                FROM joueurs";

                $result_count = $mysqli->query($sql_count);

                //Récupère le nombre de ligne dont le résultat est vrai
                $nb_count = $result_count->num_rows;

                //On fait +1 pour ajouter le nouvel utilisateur à la ligne suivante
                $nb_add = $nb_count+1;
                
                $sql_add = "INSERT INTO joueurs (id, name, price, league, post, nation, club, refTransferMarket)
                VALUES('$nb_add', '$name', '$price', '$league', '$post', '$nation', '$club', '$refTransferMarket')";
                if (mysqli_query($mysqli, $sql_add)) {
                    $confirmeCreation = 'Great ! You add'.$_POST['name']." to the database";
                } 
                else {
                    echo "Erreur : " . $sql_add . "<br>" . mysqli_error($mysqli);
                }
            }
        }  
        ?>
        <h1> Add a player in the database! </h1>
        <form id='FormAddPlayer' method="post">
            <label for="name">Name: </label>
            <input type="text" name="name" id="idname" value="" placeholder="name" required><br><br>

            <label for="price">Price: </label>
            <input type="text" name="price" id="idPrice" value="" placeholder="price" required><br><br>
            
            <label for="league">League: </label>
            <select id="idLeague" name="league">
                <option value="Ligue 1" default>Ligue 1</option>
                <option value="Premier League">Premier League</option>
                <option value="Liga">Liga</option>
                <option value="Serie A">Serie A</option>
                <option value="Bundesliga">Bundesliga</option>
            </select> <br><br>

            <label for="post">Post: </label>
            <select id="idPost" name="post">
                <option value="GK" default>GK</option>
                <option value="LB">LB</option>
                <option value="CB">CB</option>
                <option value="RB">RB</option>
                <option value="CDM">CDM</option>
                <option value="COM">COM</option>
                <option value="LW">LW</option>
                <option value="RW">RW</option>
                <option value="ST">ST</option>
            </select> <br><br>

            <label for="nation">Nation: </label>
            <input type="text" name="nation" id="idNation" value="" placeholder="nation" required><br><br>

            <label for="club">Club: </label>
            <input type="text" name="club" id="idClub" value="" placeholder="club" required><br><br>

            <label for="refTransferMarket">Rreference TransferMarket: </label>
            <input type="text" name="refTransferMarket" id="idRefTransferMarket" value="" placeholder="refTransferMarket" required><br><br>

            <input type="submit" name="formsend" id="idFormsend" value="Submit"><br><br>
        </form>

    </div>
    </div>

</body>
</html>