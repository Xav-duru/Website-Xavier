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
      
    <div id="idFormGame">
        <?php
        if(isset($_POST['submitParameters'])){
            $sold = $_POST['sold'];
            $league = $_POST['league'];
            echo $sold;
            header('Location: play.php');
        }
        ?>
    
        <form id="parameters" method="post">
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
                <option value="Ligue1" default>Ligue 1</option>
                <option value="PremierLeague">Premier League</option>
                <option value="Liga">Liga</option>
                <option value="SerieA">Serie A</option>
                <option value="Bundesliga">Bundesliga</option>
                <option value="All">all of them</option>
            </select> 
            <br><br>

            <input type="submit" name="submitParameters" id="idsubmitParameters" value="Submit"><br><br>
        </form>

        
    </div>




</body>
</html>