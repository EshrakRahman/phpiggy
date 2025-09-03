<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Config\Path;
use function App\Config\{registerMiddleware, registerRoutes};



$app = new App(Path::SOURCE . "app/container-definitions.php");

$app->get("/", [HomeController::class, "home"]);
$app->get("/about", [AboutController::class, "about"]);

registerRoutes($app);
registerMiddleware($app);
return $app;
