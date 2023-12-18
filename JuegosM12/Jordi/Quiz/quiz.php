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
            
           <div class="botones-container">
            <a href="../../../landingPageM12/gameInterface/carrouselJuegos.html"><button class="back-btn" id="back">Back</button></a>
            <button class="botonEmpezar" onclick="empezarQuiz()">¡Empezar!</button>
            </div>
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
            <div id="tiempo" class="crono">Tiempo: 0 Segundos</div>
          <p class="enunciado" id="enunciado"></p>
          
        <div class="options">
      
        </div>
        </div>
        

      

   <!-- Div de Instrucciones 2 -->
<div class="instrucciones2" id="instrucciones2" style="display: none;">
    <h2>¡Felicidades!</h2>
    <p>Has respondido todas las preguntas correctamente.</p>
    <div class="botones-container">
    <button onclick="mostrarInstrucciones2()" class="restartButton">Reiniciar juego</button>
    <!-- Añadido para pasar al siguiente juego y guardar en la base de datos por PHP -->
    <form class="scoreForm" action="../../../landingPageM12/landing/php_controllers/userController.php" method="POST">
        <input name="id_user" type="hidden" value="<?php echo $_SESSION['user']; ?>">
        <input id="scoreInput" name="scoreDataCollect" type="hidden" value="">
        <input type="submit" class="nextGameButton" name="nextGameButtonIndia" value="Siguiente juego">
    </div>
    </form>
    <!-- Fin del añadido -->
</div>


    
</div>

    
    <script src="quiz_code.js">
        
    </script>
</body>
</html>