<?php


include_once __DIR__ . "/../src/App/functions.php";
include __DIR__ . "/../src/App/bootstrap.php";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/../storage/logs/php-error.log');


$app->run();
