<?php
// Inclui a conexão com o banco de dados
require_once __DIR__ . '/../config/conexao.php';

// Retorna todos os produtos cadastrados
function listarProdutos() {
    global $conexao;
    return $conexao->query("SELECT * FROM tb_produto")->fetchAll(PDO::FETCH_ASSOC);
}

// Busca um produto específico pelo ID
function buscarProduto($id) {
    global $conexao;
    // Usa prepared statement para evitar SQL Injection
    $stmt = $conexao->prepare("SELECT * FROM tb_produto WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Insere um novo produto no banco
function inserirProduto($nome, $quantidade, $preco, $foto) {
    global $conexao;
    $sql  = "INSERT INTO tb_produto(nome, quantidade, preco, foto)
             VALUES (:nome, :quantidade, :preco, :foto)";
    $stmt = $conexao->prepare($sql);
    // Vincula os valores aos parâmetros nomeados
    $stmt->bindParam(':nome',       $nome);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':preco',      $preco);
    $stmt->bindParam(':foto',       $foto);
    $stmt->execute();
}

// Atualiza nome, quantidade e preço de um produto existente (sem alterar a foto)
function atualizarProduto($id, $nome, $quantidade, $preco) {
    global $conexao;
    $sql = $conexao->prepare(
        "UPDATE tb_produto
            SET nome = :nome, quantidade = :quantidade, preco = :preco
          WHERE id = :id"
    );
    $sql->execute([
        ':id'         => $id,
        ':nome'       => $nome,
        ':quantidade' => $quantidade,
        ':preco'      => $preco,
    ]);
}

// Remove um produto do banco pelo ID
function deletarProduto($id) {
    global $conexao;
    $stmt = $conexao->prepare("DELETE FROM tb_produto WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
