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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belleza&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./cssInicio/styles.css">
    <title >Home</title>
</head>
<body class="bodyBg">
    <div class="void">
        <div class="dropdown">
            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="imagenCambioIdioma" src="./images/worldCambiarIdioma.png" alt="lang">
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="cambiarIdioma('es')">Español</a></li>
                    <svg class="lineaSeparadoraDropdown" xmlns="http://www.w3.org/2000/svg" width="106" height="7" viewBox="0 0 106 7" fill="none">
                        <path d="M0.113252 3.15071L3.00423 6.03323L5.88675 3.14226L2.99577 0.259736L0.113252 3.15071ZM105.887 2.99585L102.996 0.113323L100.113 3.0043L103.004 5.88682L105.887 2.99585ZM3.00073 3.64648L103.001 3.50007L102.999 2.50007L2.99927 2.64648L3.00073 3.64648Z" fill="#E0D3C6"/>
                    </svg>
                <li><a class="dropdown-item" onclick="cambiarIdioma('en')">English</a></li>
                    <svg class="lineaSeparadoraDropdown" xmlns="http://www.w3.org/2000/svg" width="106" height="7" viewBox="0 0 106 7" fill="none">
                        <path d="M0.113252 3.15071L3.00423 6.03323L5.88675 3.14226L2.99577 0.259736L0.113252 3.15071ZM105.887 2.99585L102.996 0.113323L100.113 3.0043L103.004 5.88682L105.887 2.99585ZM3.00073 3.64648L103.001 3.50007L102.999 2.50007L2.99927 2.64648L3.00073 3.64648Z" fill="#E0D3C6"/>
                    </svg>
                <li><a class="dropdown-item" onclick="cambiarIdioma('cat')">Català</a></li>
            </ul>
        </div>
        <div class="centrado">
            <h1 id="titulo" data-section= "mainPage" data-value="laia">Laia Ferrer ¿nos iluminas?</h1>
            <br>
            <ol class="ol">
                <li>
                    <a class="li_a" href="./carrouselJuegos.html">
                        <p class="txt borderBottom" data-section= "mainPage" data-value="jugar">Jugar</p>
                    </a>
                    <svg class="lily" xmlns="http://www.w3.org/2000/svg" width="206" height="7" viewBox="0 0 206 7" fill="none">
                        <path d="M0.113252 3.2972L3.00423 6.17972L5.88675 3.28874L2.99577 0.40622L0.113252 3.2972ZM205.887 2.99592L202.996 0.113395L200.113 3.00437L203.004 5.88689L205.887 2.99592ZM3.00073 3.79297L203.001 3.50014L202.999 2.50014L2.99927 2.79297L3.00073 3.79297Z" fill="#E0D3C6"/>
                    </svg>
                </li>
                <li>
                    <a class="li_a" href="../../landingPageM12/landing/index.php">
                        <p class="txt" data-section= "mainPage" data-value="nuevo">Cerrar Sesion</p>
                    </a>
                    <svg class="lily" xmlns="http://www.w3.org/2000/svg" width="206" height="7" viewBox="0 0 206 7" fill="none">
                        <path d="M0.113252 3.2972L3.00423 6.17972L5.88675 3.28874L2.99577 0.40622L0.113252 3.2972ZM205.887 2.99592L202.996 0.113395L200.113 3.00437L203.004 5.88689L205.887 2.99592ZM3.00073 3.79297L203.001 3.50014L202.999 2.50014L2.99927 2.79297L3.00073 3.79297Z" fill="#E0D3C6"/>
                    </svg>
                </li>
                <li>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalStats">
                        Ranking
                    </button>
                    <br>
                    <svg class="lily" xmlns="http://www.w3.org/2000/svg" width="206" height="7" viewBox="0 0 206 7" fill="none">
                        <path d="M0.113252 3.2972L3.00423 6.17972L5.88675 3.28874L2.99577 0.40622L0.113252 3.2972ZM205.887 2.99592L202.996 0.113395L200.113 3.00437L203.004 5.88689L205.887 2.99592ZM3.00073 3.79297L203.001 3.50014L202.999 2.50014L2.99927 2.79297L3.00073 3.79297Z" fill="#E0D3C6"/>
                    </svg>
                </li>
                <li>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalCredits"
                    data-section= "mainPage" data-value="cred">
                        Créditos
                    </button>
                    <br>
                    <svg class="lily" xmlns="http://www.w3.org/2000/svg" width="206" height="7" viewBox="0 0 206 7" fill="none">
                        <path d="M0.113252 3.2972L3.00423 6.17972L5.88675 3.28874L2.99577 0.40622L0.113252 3.2972ZM205.887 2.99592L202.996 0.113395L200.113 3.00437L203.004 5.88689L205.887 2.99592ZM3.00073 3.79297L203.001 3.50014L202.999 2.50014L2.99927 2.79297L3.00073 3.79297Z" fill="#E0D3C6"/>
                    </svg>
                </li>
                <?php if ($areUser == false) { ?>
                    <li>
                        <a class="li_a" href="../landing/administration.php">
                            <p class="txt" data-section= "mainPage" data-value="admin">Administración</p>
                        </a>
                        <svg class="lily" xmlns="http://www.w3.org/2000/svg" width="206" height="7" viewBox="0 0 206 7" fill="none">
                            <path d="M0.113252 3.2972L3.00423 6.17972L5.88675 3.28874L2.99577 0.40622L0.113252 3.2972ZM205.887 2.99592L202.996 0.113395L200.113 3.00437L203.004 5.88689L205.887 2.99592ZM3.00073 3.79297L203.001 3.50014L202.999 2.50014L2.99927 2.79297L3.00073 3.79297Z" fill="#E0D3C6"/>
                        </svg>
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
                                        <p class="txt">20/20</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <div class="textbg">
                                            Brasil
                                        </div>
                                        <p class="txt">20 seg</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <div class="textbg">
                                            Kenia
                                        </div>
                                        <p class="txt">20 seg</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <div class="textbg">
                                            India
                                        </div>
                                        <p class="txt">20/20</p>
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
                            <div class="row row-cols-2">
                                <div class="col">
                                    <div class="divContenedor">
                                        <img src="./images/LaiaChibi.png" alt="LaiaChibi"
                                        width="215px" height="200px">
                                        <p class="textbg">Eviam Albuja</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <img src="./images/LaiaOtaka.png" alt="LaiaOtaka"
                                        width="215px" height="200px">
                                        <p class="textbg">Jordi Gomez</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <img src="./images/LaiaChibi.png" alt="LaiaChibi"
                                        width="215px" height="200px">
                                        <p class="textbg">Ivan Martinez</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="divContenedor">
                                        <img src="./images/LaiaOtaka.png" alt="LaiaOtaka"
                                        width="215px" height="200px">
                                        <p class="textbg">Isaac Ruiz</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="../landing/js/script.js"></script>
</body>
</html>