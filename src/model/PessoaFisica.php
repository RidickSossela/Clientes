<?php
    require_once('Cliente.php');

    class PessoaFisica extends Cliente {
        private $clientes_p_fisica;
        private $cpf;
        private $nome;
        private $data_nascimento;

        public function __get($atrib) {
            return $this->$atrib;
        }

        public function __set($atrib, $value) {
            $this->$atrib = $value;
        }

        function getClientes() {
        require_once('conexao.php');
        
        $res = $conn->query("SELECT * FROM `clientes`, `pessoafisica` 
                                    WHERE clientes.cnpj = false");

        while ($cliente = $res->fetch(PDO::FETCH_ASSOC)) {
            $clientes = [
                "id_cliente" => $cliente['id_cliente'],
                "nome" => $cliente['nome'],
                "categoria" => "Pessoa Fisica",
                "cpf" => $cliente['cpf'],
                "data_nascimento" => $cliente['data_nascimento'],
            ];
        }

        return $clientes;

    }

    
    public static function pesquisar($busca) {
        require_once('conexao.php');
        $sql = "SELECT * FROM `clientes`, `pessoafisica` 
                                    WHERE clientes.cnpj = false
                                    AND pessoafisica.clientes_p_fisica LIKE ?
                                    OR pessoafisica.nome LIKE ?
                                    OR pessoafisica.cpf LIKE ?
                                    OR pessoafisica.data_nascimento LIKE ?
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
            while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $clientes = [
                    "id_cliente" => $cliente['id_cliente'],
                    "nome" => $cliente['nome'],
                    "categoria" => "Pessoa Fisica",
                    "cpf" => $cliente['cpf'],
                    "data_nascimento" => $cliente['data_nascimento'],
                ];
            }
            
            }
        else {
            return false;

        }
    return  json_encode($clientes);
}

}
?>