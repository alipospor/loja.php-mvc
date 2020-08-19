<?php

namespace App\Loja\Helpers;

/**
 * 
 */
trait renderHtml
{
    public function  view($path, $dados = [])
    {
        extract($dados);
        include __DIR__ . "/../../view/components/header.php";
        include __DIR__ . "/../../view/pages/$path";
        include __DIR__ . "/../../view/components/footer.php";
    }
}
