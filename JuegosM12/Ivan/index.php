<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn.discordapp.com/attachments/821868428985630772/1180203519895158875/Eevee_inicial_icono.png" 
    alt="Isaac Chino" type="image/vnd.microsoft.icon">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.0/dist/confetti.browser.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/path-to/pixel-borders.scss">
    <title>Document</title>
</head>
<body>

    <section class="counter-container">
        <span class="counter">240</span>
        <span class="pista" onmouseover="mostrarPrevisualizacion(this)" onmouseout="ocultarPrevisualizacion()">
            <p>?</p>
        </span>
        <img id="previsualizacion" class="previsualizacion" src="./Imagenes/Lion Image.png" alt="Lion Image" 
        width="100px" height="100px">
    </section>

    <div class="board"></div>

    <section class="first-screen">
        <h2>Completa el puzzle</h2>
        <div class="textContainer">
            <p class="textoLoreKenya">Laia viajó a Kenia, durante</br>
                su visita vió muchos animales</br>
                que de entre ellos uno destacó</br>
                más que el resto
            </p>
        </div>
    </section>

    <section class="backBtn-container">
        <a href="../../landingPageM12/gameInterface/carrouselJuegos.html"><button class="back-btn" id="back">Back</button></a>
        <div class="back-btn-shadow"></div>
    </section>
    
    <section class="startBtn-container">
        <button class="play-btn" id="start">Start</button>
        <div class="btn-shadow"></div>
    </section>


    <script src="./script.js"></script>
</body>
</html>