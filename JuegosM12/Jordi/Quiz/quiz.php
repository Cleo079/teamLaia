<?php
    require_once('../../../landingPageM12/landing/php_libraries/db.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Quiz</title>
    <link rel="stylesheet" href="cssquiz.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <audio id="audioCorrecto" src="./correct.mp3"></audio>
    <audio id="audioIncorrecto" src="./incorrect.mp3"></audio>
    
</head>
<body>
    <div class="quiz-container">
        <div class="instrucciones" id="instrucciones">
           <div class="textoInstrucciones">
           
            <h2>Bienvenido a la India</h2>
        
             
                <p  class="bienvenida">Bienvenido a la India, en esta prueba tendrás que responder correctamente
                a seis preguntas <br> para poder conseguir las bombillas necesarias. Ojo! el tiempo vuela,
                tendrás que ser rápida. </p>  
            </div>
            
           
            
            <button class="botonEmpezar" onclick="empezarQuiz()">¡Empezar!</button>
        </div>
        <div class="question">
            <img src="./imagenes/arbol.jpg" alt="Pregunta" class="img-preguntas">
        </div>

        <div class="colb" >
            <div class="bombillas"> <img src="./imagenes/bombilla apagada.png">
                <img src="./imagenes/bombilla apagada.png">
                <img src="./imagenes/bombilla apagada.png">
                <img src="./imagenes/bombilla apagada.png">
                <img src="./imagenes/bombilla apagada.png">
                <img src="./imagenes/bombilla apagada.png">
                
            </div>
           
          <p class="enunciado" id="enunciado"></p>
        <div class="options">
        </div>
        </div>

    <!-- añadido para pasar al siguinte juego y que se guarde en la base de datos por php -->
        <div class="restartButton">
            <form class="scoreForm" action="../../../landingPageM12/landing/php_controllers/userController.php" method="POST">
                <input name="id_user" type="hidden" value="$_SESSION['user']">
                <input id="scoreInput" name="scoreDataCollect" type="hidden" value="">
                <input type="submit" class="nextGameButton" name="nextGameButtonBarcelona">
            </form>    
            Restart
        </div>

    </div>
    <script src="quiz_code.js">
        
    </script>
</body>
</html>