<?php
session_start();

require_once('../vendor/autoload.php');
require_once('../app/config/global.php');
require_once('../app/functions/functions.php');

use app\core\Router;

// Isolando os métodos ()
(new Router());