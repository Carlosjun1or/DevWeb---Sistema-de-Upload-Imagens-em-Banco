<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Estoque - Mercadão</title>

    <!-- Estilos globais e específicos desta página -->
    <link rel="stylesheet" href="../view/css/global.css">
    <link rel="stylesheet" href="../view/css/produtos.css">

    <!-- Ícone da aba via SVG inline -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🛒</text></svg>">
</head>
<body>

<!-- Faixa de identificação do painel administrativo -->
<div class="faixa-oferta">🏷️ Painel de Estoque - Gerencie seus produtos com facilidade</div>

<!-- Navegação principal -->
<nav>
    <a class="brand" href="../index.php">Mercadão</a>
    <a href="../index.php">Cadastrar Produto</a>
    <a href="../view/loja.php">🛍️ Loja</a>
    <a href="../view/produtos.php">📦 Gerenciar Estoque</a>
</nav>

<div class="container">
    <h1>Gerenciar Estoque</h1>

    <?php
    // Carrega todos os produtos do banco de dados
    require_once __DIR__ . '/../model/produto.php';
    $produtos = listarProdutos();
    ?>

    <!-- Exibe o total de produtos cadastrados -->
    <p class="total-produtos">Total de produtos cadastrados: <span><?php echo count($produtos); ?></span></p>

    <!-- Tabela de gerenciamento de estoque -->
    <div class="tabela-wrapper">
        <table>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Estoque</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>

            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td>
                    <!-- src usa "../" pois este arquivo está em view/ e foto é relativo à raiz -->
                    <img src="../<?php echo htmlspecialchars($produto['foto']); ?>"
                         alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                </td>
                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                <td>
                    <?php
                    // Exibe badge colorido conforme nível do estoque
                    $qtd = $produto['quantidade'];
                    if ($qtd == 0) {
                        echo '<span class="status-estoque status-zero">Sem estoque</span>';
                    } elseif ($qtd <= 5) {
                        echo '<span class="status-estoque status-baixo">' . $qtd . ' un. ⚠️</span>';
                    } else {
                        echo '<span class="status-estoque status-ok">' . $qtd . ' un.</span>';
                    }
                    ?>
                </td>
                <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                <td>
                    <div class="acoes-cell">
                        <!-- Botão editar: leva para a página de edição passando o ID -->
                        <a class="btn-editar" href="../view/editar.php?id=<?php echo $produto['id']; ?>">✏️ Editar</a>

                        <!-- Botão excluir: pede confirmação antes de deletar -->
                        <a class="btn-excluir" href="../controller/delete.php?id=<?php echo $produto['id']; ?>"
                           onclick="return confirm('Remover este produto do estoque?')">🗑️ Excluir</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>

            <!-- Linha exibida quando não há nenhum produto cadastrado -->
            <?php if (empty($produtos)): ?>
            <tr>
                <td colspan="6" style="text-align:center; padding: 32px; color: #888;">
                    Nenhum produto cadastrado.
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<!-- Rodapé com ano gerado dinamicamente -->
<footer class="site-footer">
    🌿 Mercadão &copy; <?php echo date('Y'); ?> - Painel Administrativo
</footer>

</body>
</html>
