<?php
$servername = "localhost";
$username = "root";
$password= "";
$databasename = "banco_alcantara_gas";

//criação da conexão
$conn = new mysqli ($servername, $username, $password, $databasename);

//verificando a conexão
if (!$conn){
    die("conexão falhou" . mysqli_connect_error());
}
else{
    echo " ";
}