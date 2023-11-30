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

        if ($user['userRol'] == 3)
        {
            header('Location: ../administration.php');
        }
        else
        {
            header('Location: ../../inicio/index.php');
        }
        exit();

    };

    if ($_SESSION['userExist'] == false )
    {
        $_SESSION['userExist'] = false;
    };

    if (isset($_SESSION['userExist']))
    {
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
        
        header('Location: ../../inicio/index.php');
    }
    else
    {
        //mesaje de error
        $_SESSION['error'] = "";
    };

    if (isset($_SESSION['error']))
    {
        header('Location: ../index.php');
        exit();
    };
};

?>