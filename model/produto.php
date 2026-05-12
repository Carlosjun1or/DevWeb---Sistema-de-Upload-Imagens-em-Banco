<?php
require_once __DIR__ . '/../config/conexao.php';

function listarProdutos() {
    global $conexao;
    return $conexao->query("SELECT * FROM tb_produto")->fetchAll(PDO::FETCH_ASSOC);
}

function buscarProduto($id) {
    global $conexao;
    $stmt = $conexao->prepare("SELECT * FROM tb_produto WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function inserirProduto($nome, $quantidade, $preco, $foto) {
    global $conexao;
    $sql  = "INSERT INTO tb_produto(nome, quantidade, preco, foto) VALUES (:nome, :quantidade, :preco, :foto)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome',       $nome);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':preco',      $preco);
    $stmt->bindParam(':foto',       $foto);
    $stmt->execute();
}

function deletarProduto($id) {
    global $conexao;
    $stmt = $conexao->prepare("DELETE FROM tb_produto WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
