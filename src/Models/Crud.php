<?php

namespace App\Loja\Models;

use PDO;
use PDOException;

class Crud
{
    private $pdo;

    public function __construct()
    {
        /* Dados para conexão banco de dados */
        $this->pdo = new PDO("mysql:host=localhost;dbname=lojaphp", "root", "");
    }

    private function buildInsert($tabela, $arrayDados)
    {
        // Inicializa variáveis   
        $query = "";
        $campos = "";
        $valores = "";

        // Loop para montar a instrução com os campos e valores   
        foreach ($arrayDados as $chave => $valor) :
            $campos .= $chave . ', ';
            $valores .= '?, ';
        endforeach;

        // Retira vírgula do final da string   
        $campos = (substr($campos, -2) == ', ') ? trim(substr($campos, 0, (strlen($campos) - 2))) : $campos;
        $valores = (substr($valores, -2) == ', ') ? trim(substr($valores, 0, (strlen($valores) - 2))) : $valores;

        // Concatena todas as variáveis e finaliza a instrução   
        $query .= "INSERT INTO {$tabela} (" . $campos . ")VALUES(" . $valores . ")";

        // Retorna string com instrução SQL   
        return trim($query);
    }

    private function buildUpdate($tabela, $arrayDados, $arrayCondicao)
    {
        // Inicializa variáveis   
        $query = "";
        $valCampos = "";
        $valCondicao = "";

        // Loop para montar a instrução com os campos e valores   
        foreach ($arrayDados as $chave => $value) {
            $valCampos .= $chave . '=?, ';
        }
        // Loop para montar a condição WHERE   
        foreach ($arrayCondicao as $chave => $value) {
            $valCondicao .= $chave . '? AND ';
        }
        // Retira vírgula do final da string   
        $valCampos = (substr($valCampos, -2) == ', ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 2))) : $valCampos;
        $valCondicao = (substr($valCondicao, -4) == 'AND ') ? trim(substr($valCondicao, 0, (strlen($valCondicao) - 4))) : $valCondicao;

        $query .= "UPDATE $tabela SET " . $valCampos . " WHERE " . $valCondicao;

        // Retorna string com instrução SQL   
        return trim($query);
    }

    private function buildDelete($tabela, $arrayCondicao)
    {
        $query = "";
        $valCampos = "";
        foreach ($arrayCondicao as $chave) {
            $valCampos .= $chave . ' = ? AND ';
        }
        $valCampos = (substr($valCampos, -4) == 'AND ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 4))) : $valCampos;
        $query .= "DELETE FROM $tabela WHERE " . $valCampos;
        return trim($query);
    }

    public function select($query, $arrayDados = null, $fetch = TRUE)
    {
        try {
            //prepara minha query a ser executada
            $sth = $this->pdo->prepare($query);

            if (!empty($arrayDados)) {
                $count = 1;
                foreach ($arrayDados as $value) {
                    $sth->bindValue($count, $value);
                    $count++;
                }
            }

            $sth->execute();
            if ($fetch) {
                $dados = $sth->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $dados = $sth->fetch(PDO::FETCH_ASSOC);
            }
            return $dados;
        } catch (PDOException $th) {
            echo "Erro: " . $th->getMessage();
        }
    }

    public function insert($tabela, $arrayDados)
    {
        try {
            $query = $this->buildInsert($tabela, $arrayDados);
            $sth = $this->pdo->prepare($query);
            $cont = 1;
            foreach ($arrayDados as $valor) {
                $sth->bindValue($cont, $valor);
                $cont++;
            }
            $retorno = $sth->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function update($tabela, $arrayDados, $arrayCondicao)
    {
        try {
            $query = $this->buildUpdate($tabela, $arrayDados, $arrayCondicao);
            $sth = $this->pdo->prepare($query);
            $cont = 1;
            foreach ($arrayDados as $valor) {
                $sth->bindValue($cont, $valor);
                $cont++;
            }
            foreach ($arrayCondicao as $valor) {
                $sth->bindValue($cont, $valor);
                $cont++;
            }
            $retorno = $sth->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function delete($tabela, $arrayCondicao)
    {
        try {
            $query = $this->buildDelete($tabela, $arrayCondicao);
            $sth = $this->pdo->prepare($query);
            $cont = 1;
            foreach ($arrayCondicao as $valor) {
                $sth->bindValue($cont, $valor);
                $cont++;
            }
            $retorno = $sth->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}
