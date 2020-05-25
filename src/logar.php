<?php
session_start();

require_once "modelos/conector.php" ;

$login = $_REQUEST['login'];
$senha = $_REQUEST['senha'];

$sql = "SELECT CODIGO, NOME, ENDERECO, LOGIN, SENHA 
        FROM CLIENTE 
        WHERE LOGIN = '$login' AND SENHA = '$senha' ";

$rs = conector::sqlQuery($sql);

$_SESSION['ID_USUARIO'] = $rs[0]['CODIGO'];

print_r(json_encode($rs) );

?>