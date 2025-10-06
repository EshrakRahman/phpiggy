<?php

declare(strict_types=1);

use Framework\{TemplateEngine, Database, Container};
use App\Config\Path;
use App\Services\{ValidatorService, UserService, TransactionService, RecieptService};

return [
    TemplateEngine::class => fn() => new TemplateEngine(Path::VIEW),
    ValidatorService::class => fn() => new ValidatorService(),
    Database::class => fn() => new Database($_ENV["DB_DRIVER"], [
        "host" => $_ENV["DB_HOST"],
        "port" => $_ENV["DB_PORT"],
        "dbname" => $_ENV["DB_NAME"]
    ], userName: $_ENV["DB_USER"], password: $_ENV["DB_PASS"]),
    UserService::class => function (Container $container)
    {
        $db = $container->get(Database::class);
        return new UserService($db);
    },
    TransactionService::class => function (Container $container)
    {
        $db = $container->get(Database::class);

        return new TransactionService($db);
    },
    RecieptService::class => function (Container $container)
    {
        $db = $container->get(Database::class);

        return new RecieptService($db);
    }
];
