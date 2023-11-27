<?php

session_start();

require_once('../php_libraries/db.php');

if (isset($_POST['logIn']))
{
    $user = selectUserbyName($_POST['user_name']);
    $userExists = false;

    // compruebo si existe este usuario
    if ($user['user_name'] == $_POST['user_name'] && $user['user_password'] == $_POST['user_password'])
    {
        $userExists = true;
        // esto me lo guardo...
        $_SESSION['user'] = $user;
        header('Location: ../stats.php');

    };

    if ($userExists == false )
    {
        $_SESSION['error'] = "";
    };

    if (isset($_SESSION['error']))
    {
        header('Location: ../index.php');
        exit();
    };
};


if (isset($_POST['singUp']))
{
    insertUser($_POST['user_name'], $_POST['user_password']);

    if (isset($_SESSION['error']))
    {
        header('Location: ../index.php');
        exit();
    }
    else
    {
        header('Location: ../stats.php');
        exit();
    };
};

?>