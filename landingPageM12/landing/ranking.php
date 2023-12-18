<?php

    require_once('./php_libraries/db.php');

    $userSession = $_SESSION['user'];

    $players = selectStats();

    $n = 1;

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
    
    <div class="container">
        <table class="table table-dark table-striped">
            <tr>
                <th>Position</th>
                <th>Name</th>
                <th>Game</th>
                <th>Score</th>
            </tr>
            
            <?php foreach($players as $player) { ?>

                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $player['id_user']; ?></td>
                    <td><?php echo $player['id_game']; ?></td>
                    <td><?php echo $player['score']; ?></td>
                </tr>
            <?php 

                $n += 1;

            } ?>

        </table>

    </div>
</body>
</html>