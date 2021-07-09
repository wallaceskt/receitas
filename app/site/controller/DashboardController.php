<?php
namespace app\site\controller;

use app\core\Controller;
use app\site\model\ClienteModel;

class DashboardController extends Controller {
    
    public function __construct() {

        $this->clienteModel = new ClienteModel();
        
    }

    public function index() {

        $cliente = $this->clienteModel->lerPorId($_SESSION['Cliente']['id']);

        $this->load('dashboard/area', [
            'cliente' => $cliente
        ]);

    }

}