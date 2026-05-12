<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto — Mercadão</title>

    <!-- Estilos globais e específicos da página de edição -->
    <link rel="stylesheet" href="../view/css/global.css">
    <link rel="stylesheet" href="../view/css/editar.css">

    <!-- Ícone da aba via SVG inline -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🛒</text></svg>">
</head>
<body>

<!-- Faixa de identificação do contexto atual -->
<div class="faixa-oferta">🏷️ Painel de Estoque - Editando produto</div>

<!-- Navegação principal -->
<nav>
    <a class="brand" href="../index.php">Mercadão</a>
    <a href="../index.php">Cadastrar Produto</a>
    <a href="../view/loja.php">🛍️ Loja</a>
    <a href="../view/produtos.php">📦 Gerenciar Estoque</a>
</nav>

<div class="container">
    <h1>Editar Produto</h1>

    <?php
    // Carrega as funções do model e busca o produto pelo ID recebido via GET
    require_once __DIR__ . '/../model/produto.php';
    $id      = $_GET['id'];
    $produto = buscarProduto($id);
    ?>

    <!--
        Formulário de edição:
        - action envia para o controller de atualização
        - Os campos são pré-preenchidos com os dados atuais do produto
    -->
    <form action="../controller/update.php" method="post">

        <label>ID</label>
        <!-- Campo ID somente leitura: não pode ser alterado pelo usuário -->
        <input type="text" name="id" readonly value="<?php echo $produto['id']; ?>">
        <p class="aviso-id">O ID não pode ser alterado.</p>

        <label>Nome do Produto</label>
        <!-- htmlspecialchars previne XSS ao exibir o nome no campo -->
        <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>">

        <label>Quantidade em Estoque</label>
        <input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>" min="0">

        <label>Preço (R$)</label>
        <input type="number" name="preco" step="0.01" value="<?php echo $produto['preco']; ?>" min="0">

        <div class="form-acoes">
            <input type="submit" value="✅ Atualizar Produto">
            <!-- Botão cancelar volta para o estoque sem salvar nada -->
            <a class="btn-cancelar" href="../view/produtos.php">Cancelar</a>
        </div>
    </form>
</div>

<!-- Rodapé com ano gerado dinamicamente -->
<footer class="site-footer">
    🌿 Mercadão &copy; <?php echo date('Y'); ?> - Painel Administrativo
</footer>

</body>
</html>
