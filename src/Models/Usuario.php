<?php

namespace App\Loja\Models;

use App\Loja\Controllers\Banco;

class Usuario
{
    private $id_usuarios;
    private $categoria_usuarios_id;
    private $nome_usuario;
    private $senha;
    private $email;
    private $url_foto;

    //Getters and Setters

    public function getId()
    {
        return $this->id_usuarios;
    }

    public function setId($id)
    {
        $this->id_usuarios = $id;
    }

    /* metodos */
    public static function getUser()
    {
        return (new Crud())->select("
        SELECT usuarios.nome_usuario , usuarios.email , usuarios.url_foto
        FROM usuarios 
        WHERE id_usuarios = ?", ['id' => 1]);
    }
}
