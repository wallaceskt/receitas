<?php
namespace app\core;

class Router {

    // Atributo privado
    private $uriEx;
    private $cliente;
    
    public function __construct() {

        $this->init();
        $this->execute();

        // ?? verifica se a $_SESSION['Cliente'] tem valor. Caso contrário será null. E atribui ao cliente
        $this->cliente = $_SESSION['Cliente'] ?? null;

    }

    private function init() {

        $uri = $_SERVER['REQUEST_URI'];

        $uri = str_replace('?', '/', $uri);

        // Divide a string $uri pelo delimitador / e remove índices em branco no array e reordena seus índices
        $ex = array_values(array_filter(explode('/', $uri)));

        // Remove o índice idesejado
        for ($i = 0; $i < UNSET_COUNT; $i++)
            unset($ex[$i]);

        // Reordena todos os índices do array
        $this->uriEx = array_values(array_filter($ex));

    }

    private function execute() {

        $class = 'HomeController';
        $method = 'index';

        // Verifica se existe algo (uma classe) na posição 0
        if (isset($this->uriEx[0])) {

            $c = 'app\\site\\controller\\' . ucfirst($this->uriEx[0]) . 'Controller';

            // Verifica se a classe informada foi implementada
            if (class_exists($c)) {

                $class = ucfirst($this->uriEx[0]) . 'Controller';

            }

        }

        // Se não existir nada na posição 0, a classe definida é a HomeController
        $controller = 'app\\site\\controller\\' . $class;

        // Verifica se existe algo (um método) na posição 1
        // Se não existir, o método definido é index
        if (isset($this->uriEx[1])) {

            // Verifica se o método informado foi implementado
            if (method_exists($controller, $this->uriEx[1])) {

                $method = $this->uriEx[1];

            }

        }

        $baseController = 'app\\site\\controller\\';

        if (isset($_SESSION['Cliente'])) {

            $pgPermission = [$baseController . 'DashboardController', $baseController . 'CategoriaController', $baseController . 'ReceitaController', $baseController . 'SobreController', $baseController . 'HomeController', $baseController . 'LoginController', $baseController . 'PesquisaController'];
            // Se não existir nenhum controller ou se o controller não estiver dentro do array de página(s)/controller(s) permitidos, o cliente não tem permissão para acessar a página
            if (!isset($controller) || !in_array($controller, $pgPermission)) {

                $controller = 'app\\site\\controller\\LoginController';
                $method = 'index';

            }

        } else {

            $pgPermission = [$baseController . 'DashboardController', $baseController . 'ReceitaController', $baseController . 'LoginController', $baseController . 'SobreController', $baseController . 'HomeController', $baseController . 'PesquisaController', $baseController . 'ClienteController'];
            // Se não exixtir nenhum controller ou se o controller não estiver dentro do array de página(s)/controller(s) permitidos, o cliente não tem permissão para acessar a página
            if (!isset($controller) || !in_array($controller, $pgPermission)) {

                $controller = 'app\\site\\controller\\LoginController';
                $method = 'index';

            }

        }

        call_user_func_array(
            [
                new $controller(),
                $method
            ],
            $this->getParams()
        );

    }

    private function getParams() {

        $p = []; // O mesmo que array()

        // Verifica se existe algo (parâmetros) na terceira posição do array
        if (count($this->uriEx) > 2) {

            // Se existir parâmetros o laço vai popular o array $p
            for ($i = 2; $i < count($this->uriEx); $i++)
                $p[] = $this->uriEx[$i];

        }

        return $p;

    }

}