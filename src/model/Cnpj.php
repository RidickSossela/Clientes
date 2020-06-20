<?php
require_once('Cliente.php');

class Cnpj extends Cliente {
    private $clientes_p_juridica;
    private $cnpj;
    private $nome_fantasia;
    private $inscricao_estadual;
    
    public function __get($atrib) {
        return $this->$atrib;
    }
    
    public function __set($atrib, $value) {
        $this->$atrib = $value;
    }
    
    function getClientes() {
        require_once('conexao.php');
        
        $res = $conn->query("SELECT * FROM `clientes`, `cnpj` 
                                    WHERE clientes.cnpj = true");

        while ($cliente = $res->fetch(PDO::FETCH_ASSOC)) {
            $clientes = [
                "id_cliente" => $cliente['id_cliente'],
                "categoria" => "CNPJ",
                "cnpj" => $cliente['cnpj'],
                "nome_fantasia" => $cliente['nome_fantasia'],
                "inscricao_estadual" => $cliente['inscricao_estadual'],
                "endereco" => $cliente['endereco'],
            ];
        }

        return $clientes;

    }

    public static function pesquisar($busca) {
        require_once('conexao.php');
        $sql = "SELECT * FROM `clientes`, `cnpj` 
                                    WHERE clientes.cnpj = true
                                    AND cnpj.clientes_p_juridica LIKE ?
                                    OR cnpj.nome_fantasia LIKE ?
                                    OR cnpj.cnpj LIKE ?
                                    OR cnpj.inscricao_estadual LIKE ?
                                    OR clientes.endereco LIKE ?
                                    ";   


        $stmt = $conn->prepare( $sql );
        $params = '%'.$busca.'%';
        $stmt->bindParam( 1, $params );
        $stmt->bindParam( 2, $params );
        $stmt->bindParam( 3, $params );
        $stmt->bindParam( 4, $params );
        $stmt->bindParam( 5, $params );
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $res = [];
            while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $res = [
                    $clientes = [
                        "clientes_p_juridica" => $cliente['clientes_p_juridica'],
                        "nome_fantasia" => $cliente['nome_fantasia'],
                        "categoria" => "CNPJ",
                        "cnpj" => $cliente['cnpj'],
                        "inscricao_estadual" => $cliente['inscricao_estadual'],
                        "endereco" => $cliente['endereco'],
                    ]
                ];
            }
            
        } else {
            $res =  ["erro" => "Nada encontrado!"];
        }
        return  json_encode($res);
        }
    }
?>