<?php
//Definir variaveis para ligar ao servidor de base de dados

$db_host="localhost";
$db_name="database_name";
$db_user="root";
$db_password="";
$db_port=3306;
$db_ligacao="mysql:host=".$db_host.";dbname=".$db_name.";port=".$db_port.";charset=utf8";

//Ligar à basde de dados com o método PDO.
try{
    $pdo=new PDO($db_ligacao, $db_user, $db_password);
}catch(PDOException $ex){
    echo "Erro no ligação à base de dados.".$ex;
}

?>