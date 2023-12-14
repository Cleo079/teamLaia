<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belleza&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css" />
    <title>Landing Page</title>
</head>

<body>
      


<!-- Comento estas lineas que son las que hacen el scroll suave porque sino no funiona el modal -->
<!-- <div class="js-cont">
	<div class="js-scroll"> -->

    <!--banderas-->

    <img src="images/fondo.webp" class="imagenFondo" alt="fondo">

    <?php
                
        if (isset($_SESSION['user']))
        {
            $user = $_SESSION['user'];
            unset($_SESSION['user']);
        }
        else
        {
            $user = [
                'user_name' => '',
                'user_password' => ''
            ];
        }
            
    ?>


    <div class="divIdentificacionUsuario">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal" id="divIniciarSesionMinimizado">
            <p class="iniciarSesionTextoDivMinimizado"
            data-section= "registrarse" data-value="iniciar">Iniciar Sesion</p>
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal" id="divRegistrarseMinimizado">
            <p class="registrarseTextoDivMinimizado"
            data-section= "registrarse" data-value="registrar">Registrarse</p>
        </button>
    </div>

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

    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="ventanaIniciarSesion">
                    <div class="divIniciaSesionVentanaIniciarSesion">
                        <p class="textoIniciaSesionVentanaIniciarSesion">Inicia Sesión</p>
                    </div>
                    <div class="divFormularioIniciarSesion">
                        <form action="./php_controllers/userController.php" method="POST">
                            <label for="labelNombreUsuarioIniciarSesion" id="labelNombreUsuarioIniciarSesion"
                            data-section= "registrarse" data-value="nombre">Nombre de
                                Usuario</label>
                            <input type="text" name="user_name"
                                id="inputNombreUsuarioIniciarSesion" value="<?php echo $user['user_name']?>" />

                            <label for="labelContrasenaIniciarSesion"
                                id="labelContrasenaIniciarSesion"
                                data-section= "registrarse" data-value="contraseña">Contraseña</label>
                            <input type="password" name="user_password"
                                id="inputContrasenaIniciarSesion" value="<?php echo $user['user_password']?>" />

                            <div class="contenedorBotones">
                                <button class="botonCerrar" type="button" data-bs-dismiss="modal" aria-label="Close">
                                    Cerrar
                                </button>

                                <div class="botonEntrar">
                                    <button type="submit" name="logIn" class="textoEntrar"
                                    data-section= "registrarse" data-value="entrar">Entrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="ventanaRegistrarse">
                    <div class="divNuevoUsuarioVentanaRegistrarse">
                        <p class="textoNuevoUsuarioVentanaRegistrarse"
                        data-section= "registrarse2" data-value="nuevo">Nuevo Usuario</p>
                    </div>
                    <div class="divFormularioRegistrarse">
                        <form action="./php_controllers/userController.php" method="POST">
                            <label for="labelNombreUsuarioRegistrarse" id="labelNombreUsuarioRegistrarse"
                            data-section= "registrarse2" data-value="nombre2">Nombre de
                                Usuario</label>
                            <input type="text" name="user_name"
                                id="inputNombreUsuarioRegistrarse" value="<?php echo $user['user_name']?>" />

                            <label for="labelContrasenaRegistrarse" id="labelContrasenaRegistrarse"
                            data-section= "registrarse2" data-value="contraseña2">Contraseña</label>
                            <input type="password" name="user_password" id="inputContrasenaRegistrarse" value="<?php echo $user['user_password']?>" />

                            <div class="contenedorBotones">
                                <button class="botonCerrar" type="button" data-bs-dismiss="modal" aria-label="Close">
                                    Cerrar
                                </button>

                                <div class="botonRegistrarse">
                                    <button type="submit" name="singUp" class="textoRegistrarse"
                                    data-section= "registrarse2" data-value="registrarse2">Registrarse</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tituloPrincipal">
        <h1 class="textoTituloPrincipal">Mejora el mundo,<mark class="textoTituloPrincipalIluminandolo"><br> iluminándolo </mark></h1>

        <button id="botonJuegaAhora" class="botonJuegaAhora">
            <p class="textoJuega"
            data-section= "titulo" data-value="juega">Juega ahora!</p>
        </button>

        <div class="averiguaMas">
            <p id="textoAveriguaMas"
            data-section= "titulo" data-value="mas">Averigua Más</p>
            <img id="imagenFlechaAbajo" src="images/iconamoonArrowDown2Bold.png" alt="flecha">
        </div>
        
    </div>

    <div class="divTextoLore">
        <p class="textoLore">
        En un mundo donde la tecnología y la magia se entrelazan, Laia Ferrer se erige como una poderosa ingeniera con la misión de tejer las fibras invisibles que alimentan la vida de los diversos pueblos. Nacida en Barcelona, pero con raíces profundas en el tranquilo pueblo de Forcall, en Castelló, Laia se sumerge en el corazón de la naturaleza cada vez que sus deberes como creadora de redes de energía sostenible lo permiten.<br><br>

        Con 46 años de edad, Laia lidera un equipo de valientes colaboradores, todos ellos unidos por un propósito común: satisfacer las necesidades energéticas de los pueblos. Su jornada no es solo un ejercicio técnico, sino una aventura que comienza con el contacto directo con la gente y los líderes locales. Juntos, recopilan información vital sobre las necesidades específicas de cada población.<br><br>

        A medida que Laia y sus colaboradores recorren los diversos pueblos, el juego se despliega ante ellos. Desafíos matemáticos, preguntas sobre geografía, problemas combinatorios: estas pruebas se presentan como obstáculos en su camino. Sin embargo, son estas pruebas las que dan forma a su misión, guiándolos hacia la creación de una red eléctrica útil y sostenible para las comunidades que sirven.<br><br>

        La formación en Ingeniería Industrial en la Universitat Politècnica de Catalunya ha preparado a Laia para este viaje. Como catedrática, no solo transmite conocimientos, sino que también encabeza la búsqueda de alternativas innovadoras con energías sostenibles. Su compromiso con la creación de un mundo mejor resuena con la niña que alguna vez soñó con viajar y dejar una huella positiva en el mundo.<br><br>

        Adéntrate en este juego épico, donde cada decisión cuenta y cada desafío superado acerca a Laia y su equipo a la realización de un sueño compartido: iluminar el mundo con una red de energía sostenible que perdure a través de las eras. ¡Prepárate para un viaje emocionante, donde la magia de la ingeniería y el espíritu aventurero se entrelazan para forjar un futuro brillante!<br><br>
        </p>
    </div>

    <button id="botonJuegaAhoraFondo" class="botonJuegaAhoraFondo">
        <p class="textoJuega"
        data-section= "titulo" data-value="juega">Juega ahora!</p>
    </button>
    <br>

    <!-- jQuery y Popper.js (Reemplaza la versión con la que estás usando) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- </div>
</div> -->

    <script src="./js/script.js"></script>
</body>

</html>