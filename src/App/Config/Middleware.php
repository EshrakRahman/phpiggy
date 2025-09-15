<?php

declare(strict_types=1);

namespace App\Config;
use Framework\App;
use App\Middleware\{
    TemplateDataMiddleware, 
    ValidationException, 
    ValidationExceptionMiddleware, 
    SessionMiddleware,
    FlashMiddleware,
    CsrfTokenMiddleware,
    CsrfGuardMiddleware
};
use Framework\TemplateEngine;

function registerMiddleware(App $app)
{
    $app->addMiddleware(CsrfGuardMiddleware::class);
    $app->addMiddleware(CsrfTokenMiddleware::class);
    $app->addMiddleware(middleware: TemplateDataMiddleware::class);
    $app->addMiddleware(middleware: ValidationExceptionMiddleware::class);
    $app->addMiddleware(middleware: FlashMiddleware::class);
    $app->addMiddleware(middleware: SessionMiddleware::class);
}
