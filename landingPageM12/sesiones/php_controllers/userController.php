<?php

require_once('../php_librarys/db.php');

if (isset($_POST['insert']))
{
    $users = selectUsers();

    // compruebo si existe este usuario
    foreach ($users as $user)
    {
        if ($user['user_name'] == $_POST['user_name'] && $user['user_password'] == $_POST['user_password'])
        {
            echo 'todo correcto';
        }
        else
        {
            $_SESSION['error'];
        }
    }

    if (isset($_SESSION['error']))
    {
        header('Location: ../landingPageM12/index.php');
        exit();
    }
    else
    {
        header('Location: ../stats.php');
        exit();
    };
};



?>