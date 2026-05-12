<?php
// Configurações de acesso ao servidor MySQL
$servername = "localhost";
$username   = "root";
$password   = "";

try {
    // Cria a conexão PDO com o MySQL (sem banco definido ainda)
    $conexao = new PDO("mysql:host=$servername", $username, $password);

    // Configura para lançar exceções em caso de erro SQL
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria o banco de dados se não existir, seleciona ele,
    // e cria a tabela de produtos se ainda não existir
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
    // Exibe o erro caso a conexão ou criação falhe
    echo $sql . "<br>" . $e->getMessage();
}
