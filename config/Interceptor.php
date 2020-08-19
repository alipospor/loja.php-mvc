<?php

class Interceptor
{
    private $PERMISSION = [
        'Administrador' => [
            'cadastro-produto',
            'home'
        ],
        'Usuario' => [
            'home'
        ],
        'Visitante' => [
            'home',
            'login',
            'cadastro'
            
        ]
    ];

    public function service()
    {
        $routes = Routes::getRoutes();
        $path = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';

        if (!array_key_exists($path, $routes)) {
            $path = 'not-found';
        } else {
            if ($this->checkPermission($path) == false) {
                $path = 'not-authorized';
            }
        }
        return $routes[$path];
    }

    private function checkPermission($path)
    {
        $tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : 'Visitante';
        return in_array($path, $this->PERMISSION[$tipo_usuario]);
    }
}
