<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadão - Cadastrar Produto</title>
    <link rel="stylesheet" href="view/css/global.css">
    <link rel="stylesheet" href="view/css/index.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🛒</text></svg>">
</head>
<body>

<div class="faixa-oferta">🏷️ Ofertas do dia - Preços atualizados! Confira nossos produtos fresquinhos 🥦</div>

<nav>
    <a class="brand" href="index.php">Mercadão</a>
    <a href="index.php">Cadastrar Produto</a>
    <a href="view/loja.php">🛍️ Loja</a>
    <a href="view/produtos.php">📦 Gerenciar Estoque</a>
</nav>

<div class="container container-form">
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

        <input type="submit" value="💾 Salvar Produto">
    </form>
    <a class="link-secundario" href="view/produtos.php">📦 Ver todos os produtos no estoque</a>
</div>

<footer class="site-footer">
    🌿 Mercadão &copy; <?php echo date('Y'); ?> - Produtos frescos, preços justos.
</footer>

</body>
</html>
