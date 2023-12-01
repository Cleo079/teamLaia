<?php

    require_once('./php_libraries/db.php');

    $userSession = $_SESSION['user'];

    $rols = selectRols();

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
    
    <div class="container pt-5">

        <div class="card-body">
            <!-- Button New User modal -->
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addUser">
                <i class="fa-solid fa-user-plus" style="color: #58d070;"></i>
            </button>
        </div>

        <!-- Modal New User-->
        <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Aquí poner values con una variable $user por si hay algún error, que los datos se queden guardados :) -->
                    <div class="modal-body">
                        <form action="./php_controllers/userController.php" method="POST">
                            <div class="form-group row p-3">
                                <label for="name" class="col-sm 2 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="user_name" placeholder="Juan">
                                </div>
                            </div>

                            <div class="form-group row p-3">
                                <label for="password" class="col-sm 2 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="password" name="user_password" placeholder="jik@asdf-.seflih">
                                </div>
                            </div>

                            <?php if ($userSession['userRol'] == 3) { ?>

                                <div class="form-group row p-3">
                                    <label for="rols" class="col-sm 2 col-form-label">Rols</label>
                                    <div class="col-sm-9">
                                        <?php foreach($rols as $rol) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="id_rol" id="inlineRadio1" value="<?php echo $rol['id_rol']?>">
                                                <label class="form-check-label" for="inlineRadio1"><?php echo $rol['name_rol']?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="insert" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-dark table-striped mt-3">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Password</th>
                <th>Rol</th>
                <th>#</th>
                <th>#</th>
            </tr>

            <?php foreach($users as $user) { ?>
                <tr>
                    <td><?php echo $user['id_user']; ?></td>
                    <td><?php echo $user['user_name']; ?></td>
                    <td><?php echo $user['user_password']; ?></td>
                    <td><?php echo $user['userRol']; ?></td>
                    <td>
                        <form action="./php_controllers/userController.php" method="POST">
                            <button type="submit" class="btn btn-outline-danger" name="delete">
                                <input type="hidden" name="id_user" value="<?php echo $user['id_user']?>">
                                <i class="fa-solid fa-trash-can" style="color: #d24141;"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <!-- Button Update User modal -->
                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $user['id_user']?>">
                            <input type="hidden" name="id_user" value="<?php echo $userSession['id_user']?>">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffc21a;"></i>
                        </button>
                    </td>
                </tr>
                
                <!-- Modal Update User-->
                <div class="modal fade" id="Modal<?php echo $user['id_user']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Update user <?php echo $user['id_user']?>
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="./php_controllers/userController.php" method="POST">

                                    <input type="hidden" name="id_user" value="<?php echo $user['id_user']?>">

                                    <div class="form-group row p-3">
                                        <label for="name" class="col-sm 2 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="user_name" value="<?php echo $user['user_name']?>">
                                        </div>
                                    </div>

                                    <div class="form-group row p-3">
                                        <label for="password" class="col-sm 2 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="password" name="user_password" value="<?php echo $user['user_password']?>">
                                        </div>
                                    </div>

                                    <?php if ($userSession['userRol'] == 3) { ?>

                                        <div class="form-group row p-3">
                                            <label for="rols" class="col-sm 2 col-form-label">Rols</label>
                                            <div class="col-sm-9">
                                                <?php foreach($rols as $rol) { ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="id_rol" id="inlineRadio1" value="<?php echo $rol['id_rol']?>">
                                                        <label class="form-check-label" for="inlineRadio1"><?php echo $rol['name_rol']?></label>

                                                        <?php if ($user['userRol'] == $rol['name_rol']) {?>
                                                            <input class="form-check-input" type="radio" name="id_rol" id="inlineRadio1" value="<?php echo $rol['id_rol']?>" checked>
                                                            <label class="form-check-label" for="inlineRadio1"></label>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    <?php } ?>
                                
                                
                                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </table>
    </div>

</body>
</html>