<?php

include __DIR__ . "/src/Framework/Database.php";

use Framework\Database;
use Dotenv\Dotenv;

$db = new Database($_ENV["DB_DRIVER"], [
        "host" => $_ENV["DB_HOST"],
        "port" => $_ENV["DB_PORT"],
        "dbname" => $_ENV["DB_NAME"]
    ], userName: $_ENV["DB_USER"] ,password: $_ENV["DB_PASS"]);


try
{

}
catch (Exception $error)
{

}


$sqlFile = file_get_contents("./database.sql");

$db->query($sqlFile);