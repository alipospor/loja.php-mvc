<?php

namespace App\Loja\Models;

use App\Loja\Controllers\Banco;

class Usuario
{
    /* metodos */
    public static function getUserByAny($campo, $id_usuarios)
    {
        return (new Crud())->select("
        SELECT  usuario.nome_usuario , usuario.email , usuario.url_foto
        FROM usuario
        INNER JOIN categoria_usuario
        ON categoria_usuario.id_categoria_usuario = usuario.categoria_usuario_id
        WHERE usuario.$campo = ?", [$campo => $id_usuarios], false);
    }

    public function getUserByEmail($campo, $email)
    {

        return (new Crud())->select("
        SELECT usuarios.id_usuarios, usuarios.nome_usuario, usuarios.senha , usuarios.email , usuarios.url_foto, categoria_usuarios.ds_usuario
        FROM usuarios 
        INNER JOIN categoria_usuarios
        ON categoria_usuarios.id_categoria_usuarios = usuarios.categoria_usuarios_id
        WHERE usuarios.$campo = ?", [$campo => $email], false);

    }

}