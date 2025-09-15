<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use App\Exceptions\SessionsExceptions;


class SessionMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        if(session_status() === PHP_SESSION_ACTIVE)
        {
            throw new SessionsExceptions("Sessions already active.");

        }

        if(headers_sent($fileName, $line))
        {
            throw new SessionsExceptions("Headers already exits. Consider enabaling output buffering. Data outputted from {$fileName} line no {$line}");
        }
        session_set_cookie_params(
            [
                "secure" => $_ENV["APP_ENV"] === "production",
                "httponly" => true,
                "samesite" => "lax"

                ]
        );
        session_start();
        $next();
        session_write_close();
    }
}