<?php
$servername = "localhost";
$username = "hostdeprojetos_alcantaragas";
$password= "webwebifsp";
$databasename = "hostdeprojetos_alcantaragas";

//criação da conexão
$conn = new mysqli ($servername, $username, $password, $databasename);

//verificando a conexão
if (!$conn){
    die("conexão falhou" . mysqli_connect_error());
}
else{
    echo " ";
}