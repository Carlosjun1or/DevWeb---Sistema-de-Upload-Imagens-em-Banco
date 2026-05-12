<?php
// Inclui as funções do model de produto
require_once __DIR__ . '/../model/produto.php';

// Recebe os dados enviados pelo formulário via POST
$nome       = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco      = $_POST['preco'];
$foto       = ''; // caminho da imagem que será salvo no banco

// Verifica se um arquivo foi enviado e se não houve erro no upload
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {

    // Pasta de destino: view/images/ dentro do projeto
    // __DIR__ aponta para controller/, então sobe um nível com /../
    $pasta    = __DIR__ . '/../view/images/';

    // Pega a extensão original do arquivo (ex: jpg, png)
    $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

    // Caminho completo onde o arquivo será gravado no servidor
    $arquivo  = $pasta . $nome . '.' . $extensao;

    // Valida se o arquivo enviado é realmente uma imagem
    $info = getimagesize($_FILES['foto']['tmp_name']);

    if ($info !== false) {
        // Move o arquivo do diretório temporário para o destino final
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $arquivo)) {
            // Salva o caminho relativo à raiz do projeto no banco.
            // loja.php e produtos.php usam "../" antes deste valor para montar o src da img
            $foto = 'view/images/' . $nome . '.' . $extensao;
        }
    }
}

try {
    // Insere o produto no banco com o caminho da imagem
    inserirProduto($nome, $quantidade, $preco, $foto);

    // Redireciona para a página inicial após o cadastro
    header('location: ../index.php');

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
