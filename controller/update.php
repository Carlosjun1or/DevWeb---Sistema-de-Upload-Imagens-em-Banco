<?php
// Inclui as funções do model de produto
require_once __DIR__ . '/../model/produto.php';

// Recebe os dados do formulário de edição via POST
$id         = $_POST['id'];
$nome       = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco      = $_POST['preco'];

try {
    // Atualiza nome, quantidade e preço no banco (a foto não é alterada aqui)
    atualizarProduto($id, $nome, $quantidade, $preco);

    // Redireciona para o gerenciamento de estoque após a atualização
    header('location: ../view/produtos.php');

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
