<?php

session_start();

function errorMessage($e)
{
    if (!empty($e->errorInfo[1]))
    {
        switch ($e->errorInfo[1])
        {
            case 1062:
                $message = 'Duplicated record';
                break;
            case 1451:
                $message = 'Record with related elements';
                break;
            case 1048:
                $message = 'This number already exists in pokedex';
                break;
            default:
                $message = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                break;
        }
    }
    else
    {
        switch ($e->getCode())
        {
            case 1044:
                $message = "Incorrect user and/or password";
                break;
            case 1049:
                $message = "Unknow database";
                break;
            case 2002:
                $message = "Server not found";
                break;
            default:
                $message = $e->getCode() . ' - ' . $e->getMessage();
                break;
        }
    }

    return $message;
}




function openDb()
{
    $servername = "localhost";
    $username = "root";
    // $password = "root";
    $password = "mysql";

    $connection = new PDO("mysql:host=$servername;dbname=laiaProject", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // to avoid problems with accent marks
    $connection->exec("set names utf8");

    return $connection;
}

function closeDb()
{
    return null;
}


function selectAll()
{
    $connection = openDb();

    $statementTxt = "SELECT
                        u.id_user,
                        u.user_name,
                        u.user_password,
                        r.name_rol as userRol
                    FROM
                        users u
                    JOIN
                        rols r ON u.userRol = r.id_rol
                    WHERE
	                    name_rol <> 'superAdmin';
                     ";

    $statement = $connection->prepare($statementTxt);
    $statement->execute();

    // fetchAll return me an associative array (data table)
    $result = $statement->fetchAll();

    $connection = closeDb();

    return $result;
}

function selectUsersAdmins()
{
    $userRol1 = 1;
    $userRol2 = 2;

    $connection = openDb();

    $statementTxt = "SELECT * FROM users
                     WHERE userRol = :userRol1
                     AND userRol = :userRol2;
                    ";

    $statement = $connection->prepare($statementTxt);
    $statement->bindParam(':userRol1', $userRol1);
    $statement->bindParam(':userRol2', $userRol2);
    $statement->execute();

    // fetchAll return me an associative array (data table)
    $result = $statement->fetchAll();

    $connection = closeDb();

    return $result;
}

function selectUserbyName($user_name)
{
    $connection = openDb();

    $statementTxt = "SELECT * FROM laiaproject.users WHERE user_name = :user_name;";

    $statement = $connection->prepare($statementTxt);
    $statement->bindParam(':user_name', $user_name);
    $statement->execute();

    // fetchAll(PDO::FETCH_ASSOC) return me an associative array AND OLNY THE NAMES!!
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $connection = closeDb();

    return $result[0];
}

function selectPlayers()
{
    $userRol = 1;
    $connection = openDb();

    $statementTxt = "SELECT
                        u.id_user,
                        u.user_name,
                        u.user_password,
                        r.name_rol as userRol
                    FROM
                        users u
                    JOIN
                        rols r ON u.userRol = r.id_rol
                    WHERE
                        userRol = :userRol;";

    $statement = $connection->prepare($statementTxt);
    $statement->bindParam(':userRol', $userRol);
    $statement->execute();

    // fetchAll(PDO::FETCH_ASSOC) return me an associative array AND OLNY THE NAMES!!
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $connection = closeDb();

    return $result;
}

function selectRols() {

    $connection = openDb();

    $statementTxt = "SELECT *
                     FROM rols
                     WHERE name_rol <> 'superAdmin';
                    ";

    $statement = $connection->prepare($statementTxt);
    $statement->execute();

    // fetchAll return me an associative array (data table)
    $result = $statement->fetchAll();

    $connection = closeDb();

    return $result;
}


function insertUser($user_name, $user_password)
{
    $userRol = 1;

    try 
    {
        $connection = openDb();

        $statementTxt = "insert into users (user_name, user_password, userRol) values (:user_name, :user_password, :userRol);";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':user_name', $user_name);
        $statement->bindParam(':user_password', $user_password);
        $statement->bindParam(':userRol', $userRol);
        $statement->execute();

        // $_SESSION['message'] = 'Record inserted succesfully';
    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
        $user['user_name'] = $user_name;
        $user['user_password'] = $user_password;
        //I saved this varible session to hold data that user inserted
        $_SESSION['user'] = $user;
    }

    $connection = closeDb();
}

function insertUserByAdmin($user_name, $user_password, $userRol)
{
    try 
    {
        $connection = openDb();

        $statementTxt = "insert into users (user_name, user_password, userRol) values (:user_name, :user_password, :userRol);";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':user_name', $user_name);
        $statement->bindParam(':user_password', $user_password);
        $statement->bindParam(':userRol', $userRol);
        $statement->execute();

        // $_SESSION['message'] = 'Record inserted succesfully';
    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
        $user['user_name'] = $user_name;
        $user['user_password'] = $user_password;
        $user['userRol'] = $userRol;
        //I saved this varible session to hold data that user inserted
        $_SESSION['user'] = $user;
    }

    $connection = closeDb();
}

function updateAll($id_user,$user_name, $user_password, $userRol)
{
    try 
    {
        $connection = openDb();

        $statementTxt = "
                        UPDATE users
                        SET user_name = :user_name, user_password = :user_password, userRol = :userRol
                        WHERE id_user = :id_user;
                        ";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':id_user', $id_user);
        $statement->bindParam(':user_name', $user_name);
        $statement->bindParam(':user_password', $user_password);
        $statement->bindParam(':userRol', $userRol);
        $statement->execute();

        // $_SESSION['message'] = 'Record inserted succesfully';
    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
        $user['user_name'] = $user_name;
        $user['user_password'] = $user_password;
        $user['userRol'] = $userRol;
        //I saved this varible session to hold data that user inserted
        $_SESSION['user'] = $user;
    }

    $connection = closeDb();
}

function deleteUser($id_user) {

    try 
    {
        $connection = openDb();

        $statementTxt = "DELETE FROM users WHERE (id_user = :id_user);";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':id_user', $id_user);
        $statement->execute();

    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
    }

    $connection = closeDb();
}

// Función para insertar datos en la base de datos
function insertBarcelonaData($id_user, $score)
{
    try {
        $connection = openDb();

        // Verificar si el registro ya existe
        $existingRecord = $connection->prepare("SELECT * FROM stats WHERE id_user = :id_user AND id_game = 1");
        $existingRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $existingRecord->execute();

        if ($existingRecord->rowCount() > 0) {
            // El registro ya existe, verificar si el score es diferente antes de eliminar e insertar
            $existingData = $existingRecord->fetch(PDO::FETCH_ASSOC);

            if ($existingData['score'] < $score) {
                // El score es diferente y mayor, eliminar el registro con el score más bajo o igual
                $deleteLowestScoreRecord = $connection->prepare("DELETE FROM stats WHERE id_user = :id_user AND id_game = 1 AND score <= :score ORDER BY score ASC LIMIT 1");
                $deleteLowestScoreRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $deleteLowestScoreRecord->bindParam(':score', $score, PDO::PARAM_INT);
                $deleteLowestScoreRecord->execute();

                // Insertar el nuevo registro
                $insertNewRecord = $connection->prepare("INSERT INTO stats (id_user, id_game, score) VALUES (:id_user, 1, :score)");
                $insertNewRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $insertNewRecord->bindParam(':score', $score, PDO::PARAM_INT);
                $insertNewRecord->execute();

                echo "Registro con el score más bajo o igual eliminado y nuevo registro insertado con éxito";
            } else {
                // El score es igual o menor, no se necesita eliminar ni insertar
                echo "El nuevo score no es mayor al score existente, no se realizó ninguna acción";
            }
        } else {
            // Insertar el nuevo registro
            $insertNewRecord = $connection->prepare("INSERT INTO stats (id_user, id_game, score) VALUES (:id_user, 1, :score)");
            $insertNewRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $insertNewRecord->bindParam(':score', $score, PDO::PARAM_INT);
            $insertNewRecord->execute();

            echo "Nuevo registro insertado con éxito";
        }

        $connection = closeDb();

    } catch (PDOException $e) {
        die("Error in insertBarcelonaData: " . errorMessage($e));
    }
}

function insertIndiaData($id_user, $score)
{
    try {
        $connection = openDb();

        // Verificar si el registro ya existe
        $existingRecord = $connection->prepare("SELECT * FROM stats WHERE id_user = :id_user AND id_game = 4");
        $existingRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $existingRecord->execute();

        if ($existingRecord->rowCount() > 0) {
            // El registro ya existe, verificar si el score es diferente antes de eliminar e insertar
            $existingData = $existingRecord->fetch(PDO::FETCH_ASSOC);

            if ($existingData['score'] > $score) {
                // El score es diferente y mayor, eliminar el registro con el score más bajo o igual
                $deleteLowestScoreRecord = $connection->prepare("DELETE FROM stats WHERE id_user = :id_user AND id_game = 4 AND score <= :score ORDER BY score ASC LIMIT 4");
                $deleteLowestScoreRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $deleteLowestScoreRecord->bindParam(':score', $score, PDO::PARAM_INT);
                $deleteLowestScoreRecord->execute();

                // Insertar el nuevo registro
                $insertNewRecord = $connection->prepare("INSERT INTO stats (id_user, id_game, score) VALUES (:id_user, 4, :score)");
                $insertNewRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $insertNewRecord->bindParam(':score', $score, PDO::PARAM_INT);
                $insertNewRecord->execute();

                echo "Registro con el score más bajo o igual eliminado y nuevo registro insertado con éxito";
            } else {
                // El score es igual o menor, no se necesita eliminar ni insertar
                echo "El nuevo score no es mayor al score existente, no se realizó ninguna acción";
            }
        } else {
            // Insertar el nuevo registro
            $insertNewRecord = $connection->prepare("INSERT INTO stats (id_user, id_game, score) VALUES (:id_user, 4, :score)");
            $insertNewRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $insertNewRecord->bindParam(':score', $score, PDO::PARAM_INT);
            $insertNewRecord->execute();

            echo "Nuevo registro insertado con éxito";
        }

        $connection = closeDb();

    } catch (PDOException $e) {
        die("Error in insertIndiaData: " . errorMessage($e));
    }
}





function insertKenyaData($id_user, $score)
{
    try {
        $connection = openDb();

        // Verificar si el registro ya existe
        $existingRecord = $connection->prepare("SELECT * FROM stats WHERE id_user = :id_user AND id_game = 3");
        $existingRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $existingRecord->execute();

        if ($existingRecord->rowCount() > 0) {
            // El registro ya existe, verificar si el score es diferente antes de eliminar e insertar
            $existingData = $existingRecord->fetch(PDO::FETCH_ASSOC);

            if ($existingData['score'] < $score) {
                // El score es diferente y mayor, eliminar el registro con el score más bajo o igual
                $deleteLowestScoreRecord = $connection->prepare("DELETE FROM stats WHERE id_user = :id_user AND id_game = 3 AND score <= :score ORDER BY score ASC LIMIT 3");
                $deleteLowestScoreRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $deleteLowestScoreRecord->bindParam(':score', $score, PDO::PARAM_INT);
                $deleteLowestScoreRecord->execute();

                // Insertar el nuevo registro
                $insertNewRecord = $connection->prepare("INSERT INTO stats (id_user, id_game, score) VALUES (:id_user, 3, :score)");
                $insertNewRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $insertNewRecord->bindParam(':score', $score, PDO::PARAM_INT);
                $insertNewRecord->execute();

                echo "Registro con el score más bajo o igual eliminado y nuevo registro insertado con éxito";
            } else {
                // El score es igual o menor, no se necesita eliminar ni insertar
                echo "El nuevo score no es mayor al score existente, no se realizó ninguna acción";
            }
        } else {
            // Insertar el nuevo registro
            $insertNewRecord = $connection->prepare("INSERT INTO stats (id_user, id_game, score) VALUES (:id_user, 3, :score)");
            $insertNewRecord->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $insertNewRecord->bindParam(':score', $score, PDO::PARAM_INT);
            $insertNewRecord->execute();

            echo "Nuevo registro insertado con éxito";
        }

        $connection = closeDb();

    } catch (PDOException $e) {
        die("Error in insertKenyaData: " . errorMessage($e));
    }
}


function inserDataGame($id_user, $id_game, $score)
{
    try 
    {
        $connection = openDb();

        $statementTxt = "insert into stats (id_user, id_game, score) values (:id_user, :id_game, :score);";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':id_user', $id_user);
        $statement->bindParam(':id_game', $id_game);
        $statement->bindParam(':score', $score);
        $statement->execute();

        // $_SESSION['message'] = 'Record inserted succesfully';
    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
    }

    $connection = closeDb();
}


function selectStats()
{
    $connection = openDb();

    $statementTxt = "SELECT
                        u.user_name as id_user,
                        g.name_game as id_game,
                        s.score
                    FROM
                        stats s
                    JOIN
                        users u ON s.id_user = u.id_user
                    JOIN
                        games g ON s.id_game = g.id_game;
                    ";

    $statement = $connection->prepare($statementTxt);
    $statement->execute();

    // fetchAll(PDO::FETCH_ASSOC) return me an associative array AND OLNY THE NAMES!!
    $result = $statement->fetchAll();

    $connection = closeDb();

    return $result;
}

function selectStatsByGame($id_game)
{
    $connection = openDb();

    $statementTxt = "SELECT
                        u.user_name as id_user,
                        id_game,
                        s.score
                    FROM
                        stats s
                    JOIN
                        users u ON s.id_user = u.id_user
                    WHERE
                        id_game = :id_game;
                    ";

    $statement = $connection->prepare($statementTxt);
    $statement->bindParam(':id_game', $id_game);
    $statement->execute();

    // fetchAll(PDO::FETCH_ASSOC) return me an associative array AND OLNY THE NAMES!!
    $result = $statement->fetchAll();

    $connection = closeDb();

    return $result;
}
?>