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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./cssInicio/styles.css">
    <title>Home</title>
</head>
<body class="bodyBg">
    <div>   
        <div class="centrado">
            <h1>Laia Ferrer¿nos iluminas?</h1>
            <ol class="ol">
                <li>
                    <a class="li_a" href="./containerJuegos.html"><p class="borderBottom">Jugar</p></a>
                </li>
                <li>
                    <a class="li_a" href="./containerJuegos.html"><p>Nuevo Juego</p></a>
                </li>
                <li>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalStats">
                        Ranking
                    </button>
                </li>
                <li>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalCredits">
                        Creditos
                    </button>
                </li>
                <?php if ($areUser == false) { ?>
                    <li>
                    <a class="li_a" href="../landing/administration.php"><p>Administration</p></a>
                    </li>
                <?php } ?>

            </ol>
        </div>
        <!-- Modal Ranking -->
        <div class="modal fade" id="modalStats">
            <!-- Añadir esto: modal-dialog-scrollable -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="divStats">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div>
                            <img src="./images/LaiaChibi.png" alt="LaiaChibi"
                                width="433px" height="500px">
                            <p class="textbg">Gatita493</p>
                        </div>
                        <div class="row row-cols-2">
                                <div class="col">
                                    <div class="divContenedor">
                                        <div class="textbg">
                                            Barcelona
                                        </div>
                                        <p>20/20</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <div class="textbg">
                                            Brasil
                                        </div>
                                        <p>20 seg</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <div class="textbg">
                                            Kenia
                                        </div>
                                        <p>20 seg</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <div class="textbg">
                                            India
                                        </div>
                                        <p>20/20</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Creditos -->
        <div class="modal fade" id="modalCredits">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="divStats">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="row row-cols-4">
                                <div class="col">
                                    <div class="divContenedor">
                                        <img src="./images/LaiaChibi.png" alt="LaiaChibi"
                                        width="215px" height="200px">
                                        <p class="textbg">Gatita493</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <img src="./images/LaiaOtaka.png" alt="LaiaOtaka"
                                        width="215px" height="200px">
                                        <p class="textbg">Alfonso</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <img src="./images/LaiaChibi.png" alt="LaiaChibi"
                                        width="215px" height="200px">
                                        <p class="textbg">Juanjo</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <img src="./images/LaiaOtaka.png" alt="LaiaOtaka"
                                        width="215px" height="200px">
                                        <p class="textbg">Alberto</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>