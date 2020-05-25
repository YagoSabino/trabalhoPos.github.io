<?php

class conector{

    function __construct(){
    }

    public static function preparaConexao(){
        $usuarioBD = "root";
        $senhaBD = "12345678";
        $mysqli = new mysqli("localhost", "$usuarioBD", "$senhaBD", "loja");

        if ($mysqli->connect_errno) {

            echo "Sorry, this website is experiencing problems.";
        
            echo "Falha ao Criar a Conexão MySQL\n";
            echo "Erro: " . $this->mysqli->connect_errno . "\n";
            echo "Erro: " . $this->mysqli->connect_error . "\n";
        
            exit;
        }
        return $mysqli;
    }

    public static function sqlQuery($sql){

       // $sql = "SELECT NOME, VALOR FROM PRODUTO";
        $mysqli =  self::preparaConexao();

        if (!$result = $mysqli->query($sql)) {

            echo "Erro ao tentar realizar operação de banco de dados \n";
            echo "Query: " . $sql . "\n";
            echo "Erro: " . $mysqli->errno . "\n";
            echo "Erro: " . $mysqli->error . "\n";
            exit;
        }
        //$result->num_rows
        $retorno = null;
        $i = 0;
        while ($valor = $result->fetch_assoc()) {

            $retorno[$i] = $valor;
            $i++;
        }

        $result->free();
        $mysqli->close();

        return $retorno;
    }

    public static function sql($sql){

         $mysqli =  self::preparaConexao();

         if (mysqli_query($mysqli, $sql)) {
           
            if (!$result = $mysqli->query("SELECT LAST_INSERT_ID() ID")) {

                echo "Erro ao tentar realizar operação de banco de dados \n";
                echo "Query: " . $sql . "\n";
                echo "Erro: " . $mysqli->errno . "\n";
                echo "Erro: " . $mysqli->error . "\n";
                exit;
            }else $retorno = $result->fetch_assoc()["ID"];

         } else {
            echo "Error: " . $sql . "" . mysqli_error($mysqli);
         }

         $mysqli->close();
 
         return $retorno;
     }

}

?>