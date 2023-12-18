<?php
    // session_start();

    // $userSession = $_SESSION['user'];

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
        Puntuación: <span class="score">0</span>/15
        Tiempo restante: <span class="timeLeft">0</span>s
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

    <div class="helpButton">?</div>
    <div class="helpContent">
    <button id="closeButton">&times;</button>
        <div class="helpScores">
            <p class="helpScoresText"><img class="bombImage" src="./images/rubbishBag.png" alt="bomba">Bien reciclado +1 punto</p> </br></br>
        </div>
        <div class="helpScores">
            <p class="helpScoresText"><img class="bombImage" src="./images/bomb.png" alt="bomba"> Bomba -5 puntos</p>
        </div>
        <div class="helpContainer">
            <div class="organicHelp">
                ¿Que se puede tirar en el contenedor organico?
                <div class="helpImagesContainer">
                    <img class="helpImages" src="./images/organic/apple.png" alt="manzana">
                    <img class="helpImages" src="./images/organic/banana.png" alt="plátano">
                    <img class="helpImages" src="./images/organic/egg.png" alt="huevo">
                    <img class="helpImages" src="./images/organic/fish.png" alt="pescado">
                </div>
            </div>
            <div class="glassHelp">
                ¿Que se puede tirar en el contenedor de vidrio?
                <div class="helpImagesContainer">
                    <img class="helpImages" src="./images/glass/canningJar.png" alt="bote">
                    <img class="helpImages" src="./images/glass/glassBottle.png" alt="botella">
                    <img class="helpImages" src="./images/glass/testTube.png" alt="tubo de ensayo">
                    <img class="helpImages" src="./images/glass/wineGlass.png" alt="botella de vino">
                </div>
            </div>
            <div class="paperCardboardHelp">
                ¿Que se puede tirar en el contenedor de papel y cartón?
                <div class="helpImagesContainer">
                    <img class="helpImages" src="./images/paperAndCardboard/cardboardBox.png" alt="caja">
                    <img class="helpImages" src="./images/paperAndCardboard/cardboardTube.png" alt="tubito">
                    <img class="helpImages" src="./images/paperAndCardboard/cerealBox.png" alt="caja de cereales">
                    <img class="helpImages" src="./images/paperAndCardboard/newspaper.png" alt="periodico">
                </div>
            </div>
            <div class="plasticsHelp">
                ¿Que se puede tirar en el contenedor de envases?
                <div class="helpImagesContainer">
                    <img class="helpImages" src="./images/plastics/bleachBottle.png" alt="lejía">
                    <img class="helpImages" src="./images/plastics/can.png" alt="lata">
                    <img class="helpImages" src="./images/plastics/plasticBag.png" alt="bolsa">
                    <img class="helpImages" src="./images/plastics/waterBottle.png" alt="botella">
                </div>
            </div>
        </div>
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
        <input name="id_user" type="hidden" value="<?php echo $userSession ?>">
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