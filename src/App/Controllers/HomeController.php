<?php

declare(strict_types=1);

namespace App\Controllers;
use Framework\TemplateEngine;
use App\Config\Path;


class HomeController
{
    private TemplateEngine $view;

    public function __construct() 
    {
        $this->view = new TemplateEngine(Path::VIEW);
    }
    public function home()
    {
        echo $this->view->render("/index.php", [
            "title" => "Home"
        ]);
        
    }
}
