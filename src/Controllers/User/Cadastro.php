<?php
namespace App\Loja\Controllers\User;

use App\Loja\Controllers\Banco;
use App\Loja\Controllers\HandlerInterface;

class Cadastro extends Banco implements HandlerInterface
{
    public function handle()
    {
        $this->view('User/Cadastro.php');
    }
}
