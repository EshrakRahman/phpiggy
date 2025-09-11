<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};

class AboutController
{


    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private UserService $userService)
    {
    }

    public function about()
    {
        echo $this->view->render("about.php", [
            "title" => "About",
            "dangerousData" => "<script> alert(123)</script>"
        ]);
    }
}
