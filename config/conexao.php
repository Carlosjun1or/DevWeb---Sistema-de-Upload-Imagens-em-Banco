<?php
$servername = "localhost";
$username   = "root";
$password   = "";

try {
    $conexao = new PDO("mysql:host=$servername", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS banco;
              USE banco;
              CREATE TABLE IF NOT EXISTS tb_produto(
                id         INT PRIMARY KEY AUTO_INCREMENT,
                nome       VARCHAR(100)  NOT NULL,
                quantidade INT           NOT NULL,
                preco      DECIMAL(10,2) NOT NULL,
                foto       VARCHAR(150)  NOT NULL
              )";

    $conexao->exec($sql);

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
