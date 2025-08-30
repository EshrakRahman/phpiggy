<?php

include_once __DIR__."/../src/App/functions.php";
include __DIR__ . "/../src/App/bootstrap.php";
echo __DIR__ . "/../src/App/bootstrap.php";


dd($app);

$app->run();