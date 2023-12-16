<?php
    require_once('../../../landingPageM12/landing/php_libraries/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Barcelona</title>
</head>
<body>
<div class="background"></div>

<div class="gameContainer">
    <div class="topBar">        
        Score: <span class="score">0</span>/10
        Time Left: <span class="timeLeft">0</span>s
    </div>
    

    <div class="container">
        <div class="textMessage">Choose a category</div>
        <div class="organicCategory">Organic</div>
        <div class="glassCategory">Glass</div>
        <div class="paperCardboardCategory">Paper and cardboard</div>
        <div class="plasticsCategory">Plastics</div>
    </div>

    <div class="countdown-container">
        <div class="countdown" id="countdown"></div>
    </div>
    
    <div class="trashCan"></div>

    <div class="gameOverMessage"></div>

    <div class="youWinMessage"></div>

    <div class="restartButton">
    <form class="scoreForm" action="../../../landingPageM12/landing/php_controllers/userController.php" method="POST">
        <input name="id_user" type="hidden" value="$_SESSION['user']">
        <input id="scoreInput" name="scoreDataCollect" type="hidden" value="">
        <input type="submit" class="nextGameButton" name="nextGameButtonBarcelona">
    </form>    
    Restart
    </div>

    

</div>

    <script src="meuJogoDoLixo.js"></script>
    <script src="/landingPageM12/gameInterface/carrousel.js"></script>
</body>
</html> 