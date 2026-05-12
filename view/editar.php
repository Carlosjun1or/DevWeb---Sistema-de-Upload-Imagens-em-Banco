<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto - Mercadão</title>
</head>
<body>

<nav>
    <a href="../index.php">Mercadão</a>
    <a href="../view/produtos.php">Gerenciar Estoque</a>
</nav>

<div>
    <h1>Editar Produto</h1>

    <?php
    require_once __DIR__ . '/../model/produto.php';
    $id      = $_GET['id'];
    $produto = buscarProduto($id);
    ?>

    <form action="../controller/update.php" method="post">
        <label>ID</label>
        <input type="text" name="id" readonly value="<?php echo $produto['id']; ?>">

        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>">

        <label>Quantidade</label>
        <input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>" min="0">

        <label>Preço (R$)</label>
        <input type="number" name="preco" step="0.01" value="<?php echo $produto['preco']; ?>" min="0">

        <input type="submit" value="Atualizar Produto">
        <a href="../view/produtos.php">Cancelar</a>
    </form>
</div>

</body>
</html>
