<?php

session_start();

require_once('../php_libraries/db.php');

if (isset($_POST['logIn']))
{
    $user = selectUserbyName($_POST['user_name']);
    $_SESSION['userExist'] = false;

    // compruebo si existe este usuario
    if ($user['user_name'] == $_POST['user_name'] && $user['user_password'] == $_POST['user_password'])
    {
        $_SESSION['userExist'] = true;
        // esto me lo guardo...
        $_SESSION['user'] = $user;

        // Almaceno el id_user en la sesión
        $_SESSION['id_user'] = $user['id_user'];

        if ($user['userRol'] == 3)
        {
            header('Location: ../administration.php');
        }
        else
        {
            header('Location: ../../gameInterface/mainPage.php');
            // header('Location: ../index.php');
        }
        exit();
    };

    if ($_SESSION['userExist'] == false )
    {
        $_SESSION['userExist'] = false;
    };

    if (isset($_SESSION['userExist']))
    {
        // header('Location: ../mainPage.php');
        header('Location: ../index.php');
        exit();
    };
};


if (isset($_POST['singUp']))
{
    if ($_POST['user_name'] != "" && $_POST['user_password'] != "")
    {
        insertUser($_POST['user_name'], $_POST['user_password']);

        $user = selectUserbyName($_POST['user_name']);
        $_SESSION['user'] = $user;
        
        // Almaceno el id_user en la sesión
        $_SESSION['id_user'] = $user['id_user'];

        // header('Location: ../../gameInterface/mainPage.php');
        header('Location: ../index.php');
    }
    else
    {
        //mesaje de error
        $_SESSION['error'] = "";
    };

    if (isset($_SESSION['error']))
    {
        // header('Location: ../mainPage.php');
        header('Location: ../index.php');
        exit();
    };
};


if (isset($_POST['update']))
{
    if ($_POST['user_name'] != "" && $_POST['user_password'] != "")
    {
        updateAll($_POST['id_user'], $_POST['user_name'], $_POST['user_password'], $_POST['id_rol']);
        header('Location: ../administration.php');
    }

    if (isset($_SESSION['error']))
    {
        header('Location: ../administration.php');
        exit();
    };
};

if (isset($_POST['delete'])) {
        
    deleteUser($_POST['id_user']);

    if (isset($_SESSION['error']))
    {
        header('Location: ../administration.php');
        exit();
    }
    else
    {
        header('Location: ../administration.php');
        exit();
    }
};

if (isset($_POST['insert']))
{
    $userSession = $_SESSION['user'];

    if ($userSession['userRol'] == 3)
    {
        if ($_POST['user_name'] != "" && $_POST['user_password'] != "" && $_POST['id_rol'] != "")
        {
            insertUserByAdmin($_POST['user_name'], $_POST['user_password'], $_POST['id_rol']);
        }
        header('Location: ../administration.php');
    }
    elseif ($userSession['userRol'] == 2)
    {
        if ($_POST['user_name'] != "" && $_POST['user_password'] != "")
        {
            insertUser($_POST['user_name'], $_POST['user_password']);
        }
        header('Location: ../administration.php');
    }

    if (isset($_SESSION['error']))
    {
        header('Location: ../administration.php');
        exit();
    };
};

if (isset($_POST['nextGameButtonBarcelona'])) {
    // Recuperar los datos del formulario
    $id_user = intval($_SESSION['id_user']);  // Usar el ID almacenado en la sesión
    $score = $_POST['scoreDataCollect'];

    // Mensaje de depuración
    echo "ID Usuario: $id_user, Puntuación: $score";
    
    // Insertar los datos en la base de datos
    insertBarcelonaData($id_user, $score);

    // Redireccionar a la página deseada
    header('Location: ../../gameInterface/carrouselJuegos.html');
    exit();
}


if (isset($_POST['nextGameButtonKenya'])) {
    // Recuperar los datos del formulario
    $id_user = intval($_SESSION['id_user']);  // Usar el ID almacenado en la sesión
    $score = $_POST['scoreDataCollect'];

    // Mensaje de depuración
    echo "ID Usuario: $id_user, Puntuación: $score";
    
    // Insertar los datos en la base de datos
    insertKenyaData($id_user, $score);

    // Redireccionar a la página deseada
    header('Location: ../../gameInterface/carrouselJuegos.html');
    exit();
}


if (isset($_POST['nextGameButtonIndia'])) {
    // Recuperar los datos del formulario
    $id_user = intval($_SESSION['id_user']);  // Usar el ID almacenado en la sesión
    $score = $_POST['scoreDataCollect'];

    // Mensaje de depuración
    echo "ID Usuario: $id_user, Puntuación: $score";
    
    // Insertar los datos en la base de datos
    insertIndiaData($id_user, $score);

    // Redireccionar a la página deseada
    header('Location: ../../gameInterface/carrouselJuegos.html');
    exit();
}


?>