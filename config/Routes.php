<?php

use App\Loja\Controllers\User\Autenticar;
use App\Loja\Controllers\User\Cadastro;
use App\Loja\Controllers\User\Home;
use App\Loja\Controllers\User\Login;

class Routes
{
    public static function getRoutes()
    {
        return array(
            /*Visitante*/
            'home' => Home::class,
            'login' => Login::class,
            'cadastro' => Cadastro::class,
            'autenticar' => Autenticar::class
        );
    }
}
