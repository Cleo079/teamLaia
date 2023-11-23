<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Landing Page</title>
</head>

<body>
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
                        <form action="#">
                            <label for="labelNombreUsuarioIniciarSesion" id="labelNombreUsuarioIniciarSesion">Nombre de
                                Usuario</label>
                            <input type="text" name="inputNombreUsuarioIniciarSesion"
                                id="inputNombreUsuarioIniciarSesion" />

                            <label for="labelContrasenaIniciarSesion"
                                id="labelContrasenaIniciarSesion">Contraseña</label>
                            <input type="password" name="inputContrasenaIniciarSesion"
                                id="inputContrasenaIniciarSesion" />

                            <label for="labelNoTienesCuenta" class="labelNoTienesCuenta">No tienes cuenta?</label>
                            <div class="contenedorBotones">
                                <div class="botonRegistrarseNoTienesCuenta">
                                    <p class="textoRegistrarseNoTienesCuenta">Registrarse</p>
                                </div>

                                <div class="botonEntrar">
                                    <p class="textoEntrar">Entrar</p>
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
        <h1 class="textoTituloPrincipal">Mejora el mundo,<mark class="textoTituloPrincipalIluminandolo"> iluminandolo</mark></h1>
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