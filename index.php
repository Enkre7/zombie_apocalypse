<?php

session_start();

// Initialisation variables
$answer_count = 0;
$count = 1;
$IsAnswered = false;

# Fonction d'affichage des résultats
function DisplayAnswer($count) {

    // Initialisation variables
    $A_answer_count = 0;
    $B_answer_count = 0;
    $C_answer_count = 0;
    $D_answer_count = 0;

    // Compte le nombre de réponses
    foreach ($_POST as $key => $post_data) {
        if ($post_data == 1) {
            $A_answer_count++;
        } elseif ($post_data == 2) {
            $B_answer_count++;
        } elseif ($post_data == 3) {
            $C_answer_count++;
        } elseif ($post_data == 4) {
            $D_answer_count++;
        }
    }

    // Résultat en fonction du nombre de réponses
    if ($A_answer_count >= ceil($count * (51/100))) {
        echo "<br><br><br><br><h2 class='answer'>Vous êtes une personne plutôt coopérative et soucieuse de l'harmonie avec les autres.</h2><br>
        <h2 class='answer'>Vous pouvez également faire preuve de trop de confiance et manquer de jugement.</h2>";
    }
    elseif ($B_answer_count >= ceil($count * (51/100))) {
        echo "<br><br><br><br><h2 class='answer'>Vous êtes quelqu'un de déterminé et courageux.</h2><br>
        <h2 class='answer'>Cependant, vous pouvez également être une personne agressive et manquer de considération pour les autres.</h2>";
    }
    elseif ($C_answer_count >= ceil($count * (51/100))) {
        echo "<br><br><br><br><h2 class='answer'>Vous êtes quelqu'un de rationnel et pragmatique.</h2><br>
        <h2 class='answer'>Cependant, vous manquez d'empathie et êtes insensible aux besoins des autres.</h2>";
    }
    elseif ($D_answer_count >= ceil($count * (51/100))) {
        echo "<br><br><br><br><h2 class='answer'>Vous êtes une personne plutôt est hésitante et incertaine.</h2><br>
        <h2 class='answer'>Cependant, vous êtes également quelqu'un de raisonnable et soucieux de la sécurité de tous.</h2>";
    } else {
        echo "<br><br><br><br><h2 class='answer'>Vos réponses sont parfaitement équilibrées, comme toute chose devrait l'être ...</h2>";
    }
}

// Parse le fichier JSON
if (!(file_exists('./questions.json'))) {
    echo "Can't read file !";
}
$questions_json = file_get_contents('./questions.json');
$decoded_json = json_decode($questions_json, true);
$questions = $decoded_json['questions'];
$questions_count = count($questions);

// Vérifie l'état de la requête POST
if (!empty($_POST)) {
    $IsAnswered = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zombie Apocalypse</title>
    <link rel="shortcut icon" href="./src/zombie_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <div class="container-fluid">
        <!-- Affichage du titre du site -->
        <div class="jumbotron">
            <h1>Zombie Apocalypse</h1>
            <h2>Quel type de survivant serez-vous ?</h2>
            <h3>Testez votre personnalité en <?php echo $questions_count ?> questions !</h3>
        </div>
        
        <!-- Affiche le résultat ou la page des questions en fonction de l'état de la requête POST -->
        <?php if ($IsAnswered == true) {
            DisplayAnswer(count($questions));
        ?>
        <?php } else { ?>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <form action="" method="post">

                        <!-- Affiche les cartes de questions en fonction du nombre de questions dans le fichier JSON -->
                        <?php foreach ($questions as $question) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <span style="font-weight: bold;"><?php echo $question['question'] ?></span>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="button">
                                        <input type="radio" id="radio_<?php echo $count ?>_1" name="question_<?php echo $count ?>" value="1">
                                        <label for="radio_<?php echo $count ?>_1"><?php echo $question['choice1'] ?></label>
                                    </div>
                                    <div class="button">
                                        <input type="radio" id="radio_<?php echo $count ?>_2" name="question_<?php echo $count ?>" value="2">
                                        <label for="radio_<?php echo $count ?>_2"><?php echo $question['choice2'] ?></label>
                                    </div>
                                    <div class="button">
                                        <input type="radio" id="radio_<?php echo $count ?>_3" name="question_<?php echo $count ?>" value="3">
                                        <label for="radio_<?php echo $count ?>_3"><?php echo $question['choice3'] ?></label>
                                    </div>
                                    <div class="button">
                                        <input type="radio" id="radio_<?php echo $count ?>_4" name="question_<?php echo $count ?>" value="4">
                                        <label for="radio_<?php echo $count ?>_4"><?php echo $question['choice4'] ?></label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        <?php $count++;
                        } ?>

                        <!-- Bouton d'envoi de la requête POST -->
                        <div class="nav-buttons">
                            <button type="submit" name="submit" class="btn btn-outline-success validate">Valider</button>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        <?php } ?>
    </div>

</body>

</html>