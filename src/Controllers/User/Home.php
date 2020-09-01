<?php

namespace App\Loja\Controllers\User;

use App\Loja\Controllers\Banco;
use App\Loja\Controllers\HandlerInterface;
use App\Loja\Models\Usuario;

class Home extends Banco implements HandlerInterface
{

    public function handle()
    {
        $this->view('Home.php', []);
    }
}
