<?php
require_once __DIR__ . '/../model/produto.php';

$id         = $_POST['id'];
$nome       = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco      = $_POST['preco'];

try {
    atualizarProduto($id, $nome, $quantidade, $preco);
    header('location: ../view/produtos.php');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
