<?php
function getRandomPlayer($post, $league, $mysqli){

    $sql_rand = "SELECT id
    FROM joueurs
    WHERE post = '".$post."'
    AND league = '".$league."'
    ORDER BY RAND()
    LIMIT 1";

    $result = $mysqli->query($sql_rand);

    //Récupère le nombre de ligne dont le résultat est vrai
    $nb = $result->num_rows;

    if (!$result) { 
        exit($mysqli->error);
    }
    else if($nb) { 
        //Créé un tableau avec les différentes valeurs
        $row = $result->fetch_assoc();

        //Récupère le numéro de l'id de l'utilisateur
        $num = $row['id'];
        return $num;

        $mysqli->close();
    }
}

// Return player's name
function getName($id, $mysqli) {
    $sql_getName = "SELECT name
    FROM joueurs
    WHERE id = '".$id."'";

    $result = $mysqli->query($sql_getName);
    $nb = $result->num_rows;

    if (!$result) { 
        exit($mysqli->error);
    }
    
    else if($nb) { 
        $row = $result->fetch_assoc();

        //Récupère le numéro de l'id de l'utilisateur
        $num = $row['name'];
        return $num;
    }
}

// Return player's price
function getPrice($id, $mysqli) {
    $sql_getPrice = "SELECT price
    FROM joueurs
    WHERE id = '".$id."'";

    $result = $mysqli->query($sql_getPrice);
    $nb = $result->num_rows;

    if (!$result) { 
        exit($mysqli->error);
    }
    
    else if($nb) { 
        $row = $result->fetch_assoc();

        //Récupère le numéro de l'id de l'utilisateur
        $num = $row['price'];
        return $num;
    }
}

// Return player's photo
function getPhoto($id, $mysqli) {
    $sql_getPhoto = "SELECT picture
    FROM joueurs
    WHERE id = '".$id."'";

    $result = $mysqli->query($sql_getPhoto);
    $nb = $result->num_rows;

    if (!$result) { 
        exit($mysqli->error);
    }
    
    else if($nb) { 
        $row = $result->fetch_assoc();

        //Récupère le numéro de l'id de l'utilisateur
        $num = $row['picture'];
        return $num;
    }
}

// Return player's photo
function getPost($name, $mysqli) {
    $sql_getPost = "SELECT post
    FROM joueurs
    WHERE name = '".$name."'";

    $result = $mysqli->query($sql_getPost);
    $nb = $result->num_rows;

    if (!$result) { 
        exit($mysqli->error);
    }
    
    else if($nb) { 
        $row = $result->fetch_assoc();

        $num = $row['post'];
        return $num;
    }
}

function getPhotoByName($name, $mysqli) {
    $sql_getPhoto = "SELECT picture
    FROM joueurs
    WHERE name = '".$name."'";

    $result = $mysqli->query($sql_getPhoto);
    $nb = $result->num_rows;

    if (!$result) { 
        exit($mysqli->error);
    }
    
    else if($nb) { 
        $row = $result->fetch_assoc();

        //Récupère le numéro de l'id de l'utilisateur
        $num = $row['picture'];

        return $photo;
    }
}

function getNumberPost($post){
    if ($post=='BU'){
        $num=9;
    }
    return $num;
}


?>