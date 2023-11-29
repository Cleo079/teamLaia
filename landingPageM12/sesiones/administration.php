<?php

    require_once('./php_libraries/db.php');

    $userSession = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/445608dbda.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php include_once ('./php_partials/menu.php') ?>

    <!-- Here i kown what rol has the user and what he can will see -->
    <?php
        if ($userSession['userRol'] == 3)
        { 
            $users = selectAll();
        }
        else if ($userSession['userRol'] == 2)
        {
            $users = selectPlayers();
        };
    ?>
    
    <div class="container">
        <table class="table table-dark table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Password</th>
                <th>Rol</th>
            </tr>

            <?php foreach($users as $user) { ?>
                <tr>
                    <td><?php echo $user['id_user']; ?></td>
                    <td><?php echo $user['user_name']; ?></td>
                    <td><?php echo $user['user_password']; ?></td>
                    <td><?php echo $user['userRol']; ?></td>
                </tr>
            <?php } ?>

        </table>

    </div>
</body>
</html>