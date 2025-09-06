<?php

declare(strict_types=1);

namespace App\Config;
use Framework\App;
use App\Middleware\{
    TemplateDataMiddleware, 
    ValidationException, 
    ValidationExceptionMiddleware, 
    SessionMiddleware,
    FlashMiddleware
};
function registerMiddleware(App $app)
{
    $app->addMiddleware(middleware: TemplateDataMiddleware::class);
    $app->addMiddleware(middleware: ValidationExceptionMiddleware::class);
    $app->addMiddleware(middleware: FlashMiddleware::class);
    $app->addMiddleware(middleware: SessionMiddleware::class);
}
