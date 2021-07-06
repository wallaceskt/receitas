<?php
namespace app\core;

class Controller {
    
    protected function load(string $view, $params = []) {

        $loader = new \Twig\Loader\FilesystemLoader('../app/site/view/');
        $twig = new \Twig\Environment($loader, ['debug' => false]);
        $twig->addGlobal('BASE', BASE);
        $twig->addGlobal('session', $_SESSION);

        echo $twig->render($view . '.twig.php', $params);

    }
    
    /**
     * showMessage
     *
     * @param  string $titulo Título da mensagem
     * @param  string $mensagem 
     * @param  string $uri
     * @param  int $httpCode
     * @return void
     */
    protected function showMessage(string $titulo, string $mensagem, string $uri, int $httpCode = 200) {

        http_response_code($httpCode);
        $this->load('partials/mensagem', [
            'titulo' => $titulo, 
            'mensagem' => $mensagem, 
            'uri' => $uri
        ]);

    }

}