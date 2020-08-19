<?php

require_once __DIR__ . "/../vendor/autoload.php";

session_start();

$classeControlador = (new Interceptor())->service();
$controller = new $classeControlador();
$controller->handle();

?>