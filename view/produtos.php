<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Estoque - Mercadão</title>
</head>
<body>

<nav>
    <a href="../index.php">Mercadão</a>
    <a href="../index.php">Cadastrar Produto</a>
    <a href="../view/produtos.php">Gerenciar Estoque</a>
</nav>

<div>
    <h1>Gerenciar Estoque</h1>

    <?php
    require_once __DIR__ . '/../model/produto.php';
    $produtos = listarProdutos();
    ?>

    <p>Total de produtos: <?php echo count($produtos); ?></p>

    <table border="1">
        <tr>
            <th>ID</th><th>Foto</th><th>Nome</th><th>Estoque</th><th>Preço</th><th>Ações</th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?php echo $produto['id']; ?></td>
            <td><img src="../<?php echo htmlspecialchars($produto['foto']); ?>" width="60"></td>
            <td><?php echo htmlspecialchars($produto['nome']); ?></td>
            <td><?php echo $produto['quantidade']; ?> un.</td>
            <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
            <td>
                <a href="../view/editar.php?id=<?php echo $produto['id']; ?>">Editar</a>
                <a href="../controller/delete.php?id=<?php echo $produto['id']; ?>"
                   onclick="return confirm('Excluir?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
