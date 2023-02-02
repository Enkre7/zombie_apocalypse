<?php

# Parse le fichier JSON
if (!(file_exists('./questions.json'))) {
    echo "Can't read file !";
}
$questions_json = file_get_contents('./questions.json');
$decoded_json = json_decode($questions_json, true);

# Compte le nombre de questions
$questions = $decoded_json['questions'];
$questions_count = count($questions);
echo $questions_count;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zombie Apocalypse !</title>
    <link rel="shortcut icon" href="./src/quiz-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Zombie Apocalypse !</h1>
            <h2>Quel type de survivant serez-vous ?</h2>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="" method="post">
                    <div class="question">
                        <div class="card" style="width:50em;">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <span style="font-weight: bold;">1\ Vous êtes dans un magasin d'alimentation rempli de provisions, mais vous entendez des zombies qui approchent rapidement. Que faites-vous?</span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div className='answer-section'>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="answer1" value="1">
                                        <label class="form-check-label" for="answer1">Vous restez et vous battez contre les zombies pour défendre les provisions.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="answer2" value="2">
                                        <label class="form-check-label" for="answer2">Vous partez en emportant autant de provisions que possible.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="answer3" value="3">
                                        <label class="form-check-label" for="answer3">Vous cachiez vous dans le magasin jusqu'à ce que les zombies soient partis.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="answer4" value="4">
                                        <label class="form-check-label" for="answer4">Vous partez sans les provisions, en vous concentrant sur votre sécurité.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="nav-buttons">
                        <button type="submit" class="btn btn-outline-success">Valider</button>
                    </div>
                    <br>
                    <br>
                    <br>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>