<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
<form id="myForm" method="post">
  <label for="inputText">Veuillez saisir une valeur :</label>
  <input type="text" id="inputText" name="inputText">
  <input type="submit" id="submitBtn" name="submitBtn" value="Valider">
</form>

<input type="button" id="activateBtn" value="Activer le bouton" disabled>

    <?php
    if (isset($_POST["submitBtn"]) && isset($_POST["inputText"])) {
        $inputValue = $_POST["inputText"];
        // Vous pouvez personnaliser ici votre condition de validation en PHP
        if ($inputValue === "valeurValide") {
            header('location:suede.html');

        }
      }
    ?>
</body>
</html>