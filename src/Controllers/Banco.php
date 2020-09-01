<?php

namespace App\Loja\Controllers;

use App\Loja\Helpers\renderHtml;
use App\Loja\Helpers\securityCrypt;
use App\Loja\Models\Crud;

abstract class Banco
{
    use renderHtml, securityCrypt;
    protected $banco;
    
    public function __construct()
    {
        $this->banco = new Crud();
    }

}
