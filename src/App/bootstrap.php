<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Config\Path;
use App\Controllers\AuthController;
use App\Controllers\RegisterController;
use Dotenv\Dotenv;
use Dotenv\Store\File\Paths;

use function App\Config\{registerMiddleware, registerRoutes};

$dotenv = Dotenv::createImmutable(Path::ROOT);
$dotenv->load();

$app = new App(Path::SOURCE . "app/container-definitions.php");



registerRoutes($app);
registerMiddleware($app);
return $app;
