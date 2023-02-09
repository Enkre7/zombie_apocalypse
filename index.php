<?php

session_start();

# Initialisation variables
$answer_count = 0;
$count = 1;
$IsAnswered = false;
$A_answer_count = 0;
$B_answer_count = 0;
$C_answer_count = 0;
$D_answer_count = 0;

# Parse le fichier JSON
if (!(file_exists('./questions.json'))) {
    echo "Can't read file !";
}

$questions_json = file_get_contents('./questions.json');
$decoded_json = json_decode($questions_json, true);
$questions = $decoded_json['questions'];

$questions_count = count($questions);

// $QuestionAnswered = 0;
// if (isset($_POST['submit'])) {
//     foreach($questions as $question) {
//         if (isset($_POST["question_$count"])) {
//             $QuestionAnswered++;
//         }
//     }
//     echo $QuestionAnswered;
//     if ($QuestionAnswered == count($questions)) {
//         $IsAnswered = true;
//     }
// }

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
        <div class="jumbotron">
            <h1>Zombie Apocalypse</h1>
            <h2>Quel type de survivant serez-vous ?</h2>
            <h3>Testez votre personnalité en <?php echo $questions_count ?> questions !</h3>
        </div>
        <?php if ($IsAnswered == true) {
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
            if ($A_answer_count > $B_answer_count and $A_answer_count > $C_answer_count and $A_answer_count > $D_answer_count) {
                echo "<h2 class='answer'>Vous êtes une personne plutôt coopérative et soucieuse de l'harmonie avec les autres.</h2><br>
                <h2 class='answer'>Vous pouvez également faire preuve de trop de confiance et manquer de jugement.</h2>";
            }
            if ($B_answer_count > $A_answer_count and $B_answer_count > $C_answer_count and $B_answer_count > $D_answer_count) {
                echo "<h2 class='answer'>Vous êtes quelqu'un de déterminé et courageux.</h2><br>
                <h2 class='answer'>Cependant, vous pouvez également être une personne agressive et manquer de considération pour les autres.</h2>";
            }
            if ($C_answer_count > $A_answer_count and $C_answer_count > $B_answer_count and $C_answer_count > $D_answer_count) {
                echo "<h2 class='answer'>Vous êtes quelqu'un de rationnel et pragmatique.</h2><br>
                <h2 class='answer'>Cependant, vous manquez d'empathie et êtes insensible aux besoins des autres.</h2>";
            }
            if ($D_answer_count > $B_answer_count and $D_answer_count > $C_answer_count and $D_answer_count > $A_answer_count) {
                echo "<h2 class='answer'>Vous êtes une personne plutôt est hésitante et incertaine.</h2><br>
                <h2 class='answer'>Cependant, vous êtes également quelqu'un de raisonnable et soucieux de la sécurité de tous.</h2>";
            }
        ?>
        <?php } else { ?>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <form action="" method="post">
                        <?php foreach ($questions as $question) { ?>
                            <div class="question">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <span style="font-weight: bold;"><?php echo $question['question'] ?></span>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="button">
                                            <input type="radio" id="radio_<?php echo $count ?>_1" name="question_<?php echo $count ?>" value="1">
                                            <label  for="radio_<?php echo $count ?>_1"><?php echo $question['choice1'] ?></label>
                                        </div>
                                        <div class="button">
                                            <input type="radio" id="radio_<?php echo $count ?>_2" name="question_<?php echo $count ?>" value="2">
                                            <label for="radio_<?php echo $count ?>_2"><?php echo $question['choice2'] ?></label>
                                        </div>
                                        <div class="button">
                                            <input type="radio" id="radio_<?php echo $count ?>_3" name="question_<?php echo $count ?>" value="3">
                                            <label  for="radio_<?php echo $count ?>_3"><?php echo $question['choice3'] ?></label>
                                        </div>
                                        <div class="button">
                                            <input type="radio" id="radio_<?php echo $count ?>_4" name="question_<?php echo $count ?>" value="4">
                                            <label  for="radio_<?php echo $count ?>_4"><?php echo $question['choice4'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        <?php $count++;
                        } ?>
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