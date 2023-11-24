<?php


function openDb()
{
    $servername = "localhost";
    $username = "root";
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


?>