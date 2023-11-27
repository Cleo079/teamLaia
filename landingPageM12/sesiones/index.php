<!DOCTYPE html>
<html lang="cat">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css" />
    <title>Landing Page</title>
</head>

<body>
<!-- Comento estas lineas que son las que hacen el scroll suave porque sino no funiona el modal -->
<!-- <div class="js-cont">
	<div class="js-scroll"> -->

    <img src="images/fondo.png" class="imagenFondo" alt="fondo">

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
        <button class="btn btn-primary" data-toggle="modal" data-target="#loginModal" id="divIniciarSesionMinimizado">
            <p class="iniciarSesionTextoDivMinimizado">Iniciar Sesion</p>
        </button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#registerModal" id="divRegistrarseMinimizado">
            <p class="registrarseTextoDivMinimizado">Registrarse</p>
        </button>
    </div>

    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="ventanaIniciarSesion">
                    <div class="divIniciaSesionVentanaIniciarSesion">
                        <p class="textoIniciaSesionVentanaIniciarSesion">Inicia Sesión</p>
                    </div>
                    <div class="divFormularioIniciarSesion">
                        <form action="./php_controllers/userController.php" method="POST">
                            <label for="labelNombreUsuarioIniciarSesion" id="labelNombreUsuarioIniciarSesion">Nombre de
                                Usuario</label>
                            <input type="text" name="user_name"
                                id="inputNombreUsuarioIniciarSesion" value="<?php echo $user['user_name']?>" />

                            <label for="labelContrasenaIniciarSesion"
                                id="labelContrasenaIniciarSesion">Contraseña</label>
                            <input type="password" name="user_password"
                                id="inputContrasenaIniciarSesion" value="<?php echo $user['user_password']?>" />

                            <label for="labelNoTienesCuenta" class="labelNoTienesCuenta">No tienes cuenta?</label>
                            <div class="contenedorBotones">
                                <div class="botonRegistrarseNoTienesCuenta">
                                    <p class="textoRegistrarseNoTienesCuenta">Registrarse</p>
                                </div>

                                <div class="botonEntrar">
                                    <button type="submit" name="logIn" class="textoEntrar">Entrar</button>
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
                        <p class="textoNuevoUsuarioVentanaRegistrarse">Nuevo Usuario</p>
                    </div>
                    <div class="divFormularioRegistrarse">
                        <form action="./php_controllers/userController.php" method="POST">
                            <label for="labelNombreUsuarioRegistrarse" id="labelNombreUsuarioRegistrarse">Nombre de
                                Usuario</label>
                            <input type="text" name="user_name"
                                id="inputNombreUsuarioRegistrarse" value="<?php echo $user['user_name']?>" />

                            <label for="labelContrasenaRegistrarse" id="labelContrasenaRegistrarse">Contraseña</label>
                            <input type="password" name="user_password" id="inputContrasenaRegistrarse" value="<?php echo $user['user_password']?>" />

                            <label for="labelTienesCuenta" class="labelTienesCuenta">Ya tienes cuenta?</label>
                            <div class="contenedorBotones">
                                <div class="botonEntrarTienesCuenta">
                                    <p class="textoEntrarTienesCuenta">Entrar</p>
                                </div>

                                <div class="botonRegistrarse">
                                    <button type="submit" name="singUp" class="textoRegistrarse">Registrarse</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tituloPrincipal">
        <h1 class="textoTituloPrincipal">Mejora el mundo,<mark class="textoTituloPrincipalIluminandolo"><br> iluminandolo</mark></h1>
        <div class="botonJuegaAhora">
            <p class="textoJuega">Juega ahora!</p>
        </div>

        <div class="averiguaMas">
            <p id="textoAveriguaMas">Averigua Más</p>
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

    <div class="botonJuegaAhoraFondo">
        <p class="textoJuega">Juega ahora!</p>
    </div>
    <br>

    <!-- jQuery y Popper.js (Reemplaza la versión con la que estás usando) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- </div>
</div> -->
</body>

</html>