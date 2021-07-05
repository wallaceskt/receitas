<?php
namespace app\site\controller;

use app\core\Controller;

class DashboardController extends Controller {
    
    public function __construct() {

        //echo "Olá, Mundo!";
        
    }

    public function index() {

        $this->load('dashboard/area');

    }

}