<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use App\Config\Path;
use App\Services\ValidatorService;

return[
    TemplateEngine::class => fn() => new TemplateEngine(Path::VIEW),
    ValidatorService::class => fn() => new ValidatorService()
];