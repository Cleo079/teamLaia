<?php

    session_start();

    $areUser = true;


    $userSession = $_SESSION['user'];

    if ($userSession['userRol'] != 1)
    { 
        $areUser = false;
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn.discordapp.com/attachments/821868428985630772/1064859328340828160/Visualizaci3Fn_de_personaje_Nilou.png" 
    alt="Game Icon" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" type="text/css" href="cssInicio/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body class="bodyBg">
    <div>   
        <div class="centrado">
            <h1>Laia Ferrer¿nos iluminas?</h1>
            <ol class="ol">
                <li class="li_a">
                    <a href="./containerJuegos.html"><p class="borderBottom">Jugar</p></a>
                </li>
                <li>
                    <a href="./containerJuegos.html"><p>Nuevo Juego</p></a>
                </li>
                <li>
                    <a href="../sesiones/ranking.php"><p>Ranking</p></a>
                </li>
                <li>
                    <a href="./containerJuegos.html"><p>Creditos</p></a>
                </li>
                <?php if ($areUser == false) { ?>
                    <li>
                    <a href="../sesiones/administration.php"><p>Administration</p></a>
                    </li>
                <?php } ?>

            </ol>
        </div>
    </div>
</body>
</html>