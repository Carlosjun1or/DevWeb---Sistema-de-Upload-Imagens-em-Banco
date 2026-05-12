<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mercadão - Cadastrar Produto</title>
</head>
<body>

<nav>
    <a href="index.php">Mercadão</a>
    <a href="index.php">Cadastrar Produto</a>
</nav>

<div>
    <h1>Novo Produto</h1>
    <form action="controller/insert.php" method="post" enctype="multipart/form-data">
        <label>Nome do Produto</label>
        <input type="text" name="nome" placeholder="Ex: Arroz Branco 5kg">

        <label>Quantidade em Estoque</label>
        <input type="number" name="quantidade" placeholder="0" min="0">

        <label>Preço (R$)</label>
        <input type="number" name="preco" step="0.01" placeholder="0,00" min="0">

        <label>Foto do Produto</label>
        <input type="file" name="foto" accept="image/*">

        <input type="submit" value="Salvar Produto">
    </form>
</div>

</body>
</html>
