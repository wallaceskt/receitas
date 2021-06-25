<?php
namespace app\site\controller;

use app\core\Controller;

class CategoriaController extends Controller {

    public function __construct() {

    }

    public function index() {

        $this->load('categoria/main');

    }

    public function adicionar() {

        $this->load('categoria/adicionar');

    }

    public function editar() {

        $this->load('categoria/editar');

    }

}