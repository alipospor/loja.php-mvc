<?php

namespace App\Loja\Controllers\User;

use App\Loja\Controllers\Banco;
use App\Loja\Controllers\HandlerInterface;

class Login extends Banco implements HandlerInterface
{
    public function handle()
    {
        $this->view('User/Login.php');
    }
}
