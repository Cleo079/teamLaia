<?php
    require_once('../../landingPageM12/landing/php_libraries/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Maze Game</title>
</head>
<body>

    <section class="counter-container">

        <button id="back"> back </button>

        <p id="counter"> timer </p>

    </section>

    <div class="game">
        <h1 id="title">Maze</h1>
        <select id="levelSelect">
            <option selected>Levels</option>
            <option value="1">Level 1</option>
            <option value="2">Level 2</option>
            <option value="3">Level 3</option>
        </select>

        <div id="maze-container">
            <img src="images/warrior/warrior_down.gif" alt="warrior" id="warrior" height="50px" width="50px">
            <!-- <img src="img/door.png" alt="door" id="door" height="50px" width="50px"> -->
            <div id="lantern"></div>
            <div id="lanternDoor"></div>
        </div>

    </div>

    <!-- añadido para pasar al siguinte juego y que se guarde en la base de datos por php -->
    <div class="restartButton">
        <form class="scoreForm" action="../../landingPageM12/landing/php_controllers/userController.php" method="POST">
            <input name="id_user" type="hidden" value="$_SESSION['user']">
            <input id="scoreInput" name="scoreDataCollect" type="hidden" value="">
            <button type="submit" class="nextGameButton" name="nextGameButtonBarcelona" id="again" >Restart</button>
        </form>
    </div>

    

    <script src="script.js"></script>
</body>
</html>