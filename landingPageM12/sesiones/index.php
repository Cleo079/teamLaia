<!DOCTYPE html>
<html lang="en">

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
                        <form action="../php_controllers/userController.php" method="POST">
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
                                    <button type="submit" name="insert" class="textoEntrar">Entrar</button>
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
                        <form action="#">
                            <label for="labelNombreUsuarioRegistrarse" id="labelNombreUsuarioRegistrarse">Nombre de
                                Usuario</label>
                            <input type="text" name="inputNombreUsuarioRegistrarse"
                                id="inputNombreUsuarioRegistrarse" />

                            <label for="labelContrasenaRegistrarse" id="labelContrasenaRegistrarse">Contraseña</label>
                            <input type="password" name="inputContrasenaRegistrarse" id="inputContrasenaRegistrarse" />

                            <label for="labelTienesCuenta" class="labelTienesCuenta">Ya tienes cuenta?</label>
                            <div class="contenedorBotones">
                                <div class="botonEntrarTienesCuenta">
                                    <p class="textoEntrarTienesCuenta">Entrar</p>
                                </div>

                                <div class="botonRegistrarse">
                                    <p class="textoRegistrarse">Registrarse</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tituloPrincipal">
        <h1 class="textoTituloPrincipal">Mejora el mundo,<mark class="textoTituloPrincipalIluminandolo"> iluminándolo</mark></h1>
        <div class="botonJuegaAhora">
            <p class="textoJuega">Juega ahora!</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>