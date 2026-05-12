<?php
require_once __DIR__ . '/../model/produto.php';

$id = $_GET['id'];

try {
    deletarProduto($id);
    header('location: ../view/produtos.php');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
