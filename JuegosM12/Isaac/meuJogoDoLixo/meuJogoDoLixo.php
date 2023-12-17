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
    
    <div class="gameTitle">Reciclar en Barcelona</div>

    <div class="container">
        <div class="organicCategory">
            <div class="organicTrashcanImage"></div>
            <p>Orgánico</p> 
        </div>

        <div class="glassCategory">
            <div class="glassTrashcanImage"></div>
            <p>Vidrio</p> 
        </div>

        <div class="paperCardboardCategory">
            <div class="paperCardboardTrashcanImage"></div>
            <p>Papel y cartón</p> 
        </div>

        <div class="plasticsCategory">
            <div class="plasticsTrashcanImage"></div>
            <p>Envases</p> 
        </div>

        <div class="tutorialContainer">
            <p>Controles</p>
            <div class="tutorialImage"></div>
        </div>
    </div>



    <div class="actionButtons">
        <button class="backButton">ATRÁS</button>

        <button class="playButton" >JUGAR</button>
    </div>

    <div class="countdown-container">
        <div class="countdown" id="countdown"></div>
    </div>
    
    <div class="trashCan"></div>

    <div class="gameOverMessageContainer">
        <div class="gameOverMessage"></div>
        <div class="gameOverMessage2"></div>
    </div>

    <div class="youWinMessage"></div>

    <div class="afterGameButtons">
    <form class="scoreForm" action="../../../landingPageM12/landing/php_controllers/userController.php" method="POST">
        <input name="id_user" type="hidden" value="<?php echo $_SESSION['user']?>">
        <input id="scoreInput" name="scoreDataCollect" type="hidden" value="">
        <button type="submit" class="nextGameButton" name="nextGameButtonBarcelona">SIGUIENTE JUEGO</button>
    </form>
    <button class="restartGameButton" >VOLVER A JUGAR</button> 
    </div>

    

</div>

    <script src="meuJogoDoLixo.js"></script>
    <script src="/landingPageM12/gameInterface/carrousel.js"></script>
</body>
</html> 