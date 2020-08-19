<?php

namespace App\Loja\Models;

use PDO;

class Crud
{
    private $pdo;

    public function __construct()
    {
        /* Dados para conexão banco de dados */
        $this->pdo = new PDO("mysql:host=localhost;dbname=sitephp", "root", "");
    }

    public function select($query, $params=null)
    {
        try {
            $sth = $this->pdo->prepare($query);

            if (!empty($params)) {
                $count = 1;
                foreach ($params as $value) {
                    $sth->bindValue($count, $value);
                    $count++;
                }
            }
            $sth->execute();

            $dados = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        } catch (\Throwable $th) {
            echo "Erro: " . $th->getMessage();
        }
    }
}
