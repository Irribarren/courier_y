<?php
$server ="localhost:8111";
$user = "root";
$pass ="";
$db="php_login_database";
/*
try{
 $conn = new PDO("mysql:host=$server;dbname=$db;",$user,$pass);
} catch (PDOException $e) {
    die("falló la conexion: ".$e->getMessage());
}*/
$conn = new mysqli($server,$user,$pass,$db);
if($conn->connect_errno==0){
    echo "conexion exitosa";
}else{
    echo "conexion erronea ".$conn->connect_error;}

