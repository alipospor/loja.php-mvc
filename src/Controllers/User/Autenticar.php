<?php

namespace App\Loja\Controllers\User;

use App\Loja\Controllers\Banco;
use App\Loja\Controllers\HandlerInterface;
use App\Loja\Models\Usuario;

class Autenticar extends Banco implements HandlerInterface
{
    /* Dados que vem do formulário */
    private $email;
    private $senha;

    /* Usuario que vem do registro do banco */
    private $usuario;


    public function handle()
    {
        $acao = (!empty($_GET['acao'])) ? $_GET['acao'] : FALSE ;
        switch ($acao) {
            case 'login':
                if (isset($_POST) && !empty($_POST)) {
                    /* Pega o email que o usuario enviou pelo form procura no banco, pega este retorno e insere na private $usuario */
                    $this->setUsuario($this->getEmail());

                    if (!empty($this->usuario)) {
                        $this->validateRegister();
                    } else {
                        echo "não possui registro";
                    }
                } else {
                    echo "Erro formulario";
                    return false;
                }
                break;
            case 'cadastro':
                $this->validateMail();
                break;

            default:
                echo "não sei o que você quis dizer!";
                break;
        }
    }

    /* metodos e validações */
    private function validateMail()
    {
        if (!empty($_POST["email"]) && isset($_POST["email"])) {
            $this->setEmail($_POST["email"]);;
            return true;
        } else {
            echo "email vazia";
            return false;
        }
    }

    private function validatePass()
    {
        if (!empty($_POST["senha"]) && isset($_POST["senha"])) {
            $this->setSenha($_POST["senha"]);
            return true;
        } else {
            echo "senha vazia";
            return false;
        }
    }

    private function validateRegister()
    {
        if (hash_equals($this->getUsuario()["email"], $this->getEmail()) && ($this->compareHash($this->getSenha(), $this->getUsuario()["senha"]))) {
            session_destroy();
            foreach ($this->getUsuario() as $key => $value) {
                $_SESSION[$key] = (!hash_equals("senha", $key)) ? $value : NULL;
            }
            return true;
        } else {
            echo "falsiane";
            return false;
        }
    }

    /* Geters and seters */
    private function setEmail($mail)
    {
        $this->email = $mail;
    }

    private function getEmail()
    {
        return $this->email;
    }

    private function setSenha($pass)
    {
        $this->senha = $pass;
    }

    private function getSenha()
    {
        return $this->senha;
    }

    private function setUsuario($email)
    {
        $this->usuario = (new Usuario())->getUserByAny("email", $email);
    }

    private function getUsuario()
    {
        return $this->usuario;
    }
}
