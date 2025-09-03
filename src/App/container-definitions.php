<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use app\Config\Path;

return[
    TemplateEngine::class => fn() => new TemplateEngine(Path::VIEW)
];