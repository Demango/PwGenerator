<?php

// skipping router implementation

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/task/src/helper/autoload.php');

use task\Controller\GenerationController;

$controller = new GenerationController();

$controller->getHome();
