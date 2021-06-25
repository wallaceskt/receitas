<?php
namespace app\core;

class Controller {
    
    protected function load(string $view, $params = []) {

        $loader = new \Twig\Loader\FilesystemLoader('../app/site/view/');
        $twig = new \Twig\Environment($loader, ['debug' => false]);
        $twig->addGlobal('BASE', BASE);

        echo $twig->render($view . '.twig.php', $params);

    }

}
