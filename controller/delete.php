<?php
// Inclui as funções do model de produto
require_once __DIR__ . '/../model/produto.php';

// Recebe o ID do produto a excluir via parâmetro GET (ex: ?id=3)
$id = $_GET['id'];

try {
    // Remove o produto do banco de dados
    deletarProduto($id);

    // Redireciona de volta para o gerenciamento de estoque
    header('location: ../view/produtos.php');

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
