<?php
require_once __DIR__ . '/../model/produto.php';

$nome       = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco      = $_POST['preco'];
$foto       = '';

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $pasta    = __DIR__ . '/../imagens/';
    $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $arquivo  = $pasta . $nome . '.' . $extensao;
    $info     = getimagesize($_FILES['foto']['tmp_name']);

    if ($info !== false) {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $arquivo)) {
            $foto = 'imagens/' . $nome . '.' . $extensao;
        }
    }
}

try {
    inserirProduto($nome, $quantidade, $preco, $foto);
    header('location: ../index.php');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
