<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Mercadão</title>

    <!-- Estilos globais e específicos da loja -->
    <link rel="stylesheet" href="../view/css/global.css">
    <link rel="stylesheet" href="../view/css/loja.css">

    <!-- Ícone da aba via SVG inline -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🛒</text></svg>">
</head>
<body>

<!-- Faixa de boas-vindas no topo -->
<div class="faixa-oferta">🏷️ Bem-vindo ao Mercadão! Preços atualizados todo dia 🥦🍎🥩</div>

<!-- Navegação principal -->
<nav>
    <a class="brand" href="../index.php">Mercadão</a>
    <a href="../index.php">Cadastrar Produto</a>
    <a href="../view/loja.php">🛍️ Loja</a>
    <a href="../view/produtos.php">📦 Gerenciar Estoque</a>
</nav>

<!-- Seção hero: banner principal da loja -->
<div class="hero-loja">
    <div class="hero-content">
        <h2>Tudo que você precisa,<br>em um só lugar 🛒</h2>
        <p>Produtos frescos, preços justos, entrega rápida.</p>
        <!-- Botão que rola a página até a seção de produtos -->
        <a href="#produtos" class="btn-hero">Ver Produtos ↓</a>
    </div>
    <!-- Selos de benefícios da loja -->
    <div class="hero-badges">
        <span>🚚 Entrega grátis</span>
        <span>✅ Qualidade garantida</span>
        <span>💳 10x sem juros</span>
    </div>
</div>

<!-- Barra de busca para filtrar produtos por nome -->
<div class="barra-busca-wrapper">
    <div class="barra-busca">
        <!-- oninput chama filtrarCards() a cada tecla digitada -->
        <input type="text" id="busca" placeholder="🔍  Buscar produto..." oninput="filtrarCards()">
    </div>
</div>

<!-- Vitrine de produtos -->
<section id="produtos" class="vitrine-section">
    <div class="vitrine-header">
        <h2>Nossos Produtos</h2>
        <!-- Contador atualizado dinamicamente pelo JS -->
        <span id="contador-produtos"></span>
    </div>

    <!-- Grid de cards de produtos gerado via PHP -->
    <div class="cards" id="grid-produtos">
        <?php
        // Carrega os produtos do banco de dados
        require_once __DIR__ . '/../model/produto.php';
        $produtos = listarProdutos();

        if (empty($produtos)): ?>
            <!-- Mensagem exibida quando não há produtos cadastrados -->
            <div class="sem-produtos">
                <span>🛒</span>
                Nenhum produto disponível no momento.
            </div>
        <?php else:
            foreach ($produtos as $i => $produto):
                $semEstoque = $produto['quantidade'] == 0; // flag para produto esgotado
        ?>
        <!-- Card do produto; recebe classe extra se estiver esgotado -->
        <!-- data-nome é usado pelo filtro de busca em JavaScript -->
        <div class="card <?php echo $semEstoque ? 'card-indisponivel' : ''; ?>"
             data-nome="<?php echo strtolower(htmlspecialchars($produto['nome'])); ?>">

            <?php
            // Define o badge de destaque do card:
            // - "Oferta" a cada 4 produtos disponíveis
            // - "Esgotado" se sem estoque
            // - "Últimas unidades" se estoque <= 5
            if ($i % 4 === 0 && !$semEstoque): ?>
                <div class="card-badge">🏷️ Oferta</div>
            <?php elseif ($semEstoque): ?>
                <div class="card-badge badge-esgotado">Esgotado</div>
            <?php elseif ($produto['quantidade'] <= 5): ?>
                <div class="card-badge badge-urgente">⚡ Últimas unidades</div>
            <?php endif; ?>

            <!-- Imagem do produto; onerror oculta a tag se a foto não existir -->
            <div class="card-img-wrap">
                <img src="../<?php echo htmlspecialchars($produto['foto']); ?>"
                     alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                     onerror="this.style.display='none'; this.onerror=null;">
            </div>

            <div class="card-info">
                <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>

                <!-- Indicador de estoque com estilo condicional -->
                <p class="estoque">
                    <?php if ($semEstoque): ?>
                        <span class="tag-esgotado">Produto esgotado</span>
                    <?php elseif ($produto['quantidade'] <= 5): ?>
                        <span class="tag-urgente">Restam só <?php echo $produto['quantidade']; ?> un.!</span>
                    <?php else: ?>
                        <span class="tag-ok">✔ Em estoque (<?php echo $produto['quantidade']; ?> un.)</span>
                    <?php endif; ?>
                </p>

                <!-- Bloco de preço com parcelamento calculado -->
                <div class="preco-bloco">
                    <small>por apenas</small>
                    <strong>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></strong>
                    <span class="parcelamento">ou 10x R$ <?php echo number_format($produto['preco'] / 10, 2, ',', '.'); ?></span>
                </div>

                <!-- Botão desabilitado automaticamente se sem estoque -->
                <button class="btn-comprar" <?php echo $semEstoque ? 'disabled' : ''; ?>>
                    <?php echo $semEstoque ? '😞 Indisponível' : '🛒 Adicionar ao Carrinho'; ?>
                </button>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>

    <!-- Mensagem exibida pelo JS quando a busca não encontra resultados -->
    <div id="sem-resultado" class="sem-resultado" style="display:none;">
        <span>🔍</span>
        Nenhum produto encontrado para "<strong id="termo-busca"></strong>"
    </div>
</section>

<!-- Rodapé com ano gerado dinamicamente -->
<footer class="site-footer">
    🌿 Mercadão &copy; <?php echo date('Y'); ?> - Produtos frescos, preços justos.
</footer>

<script>
    // Exibe o total de produtos ao carregar a página
    const cards = document.querySelectorAll('.card');
    document.getElementById('contador-produtos').textContent = cards.length + ' produto(s)';

    // Filtra os cards conforme o texto digitado na busca
    function filtrarCards() {
        const termo = document.getElementById('busca').value.toLowerCase().trim();
        const cards = document.querySelectorAll('#grid-produtos .card');
        let visiveis = 0;

        cards.forEach(card => {
            const nome  = card.dataset.nome || '';
            const match = nome.includes(termo);
            // Mostra ou oculta o card conforme o resultado da busca
            card.style.display = match ? '' : 'none';
            if (match) visiveis++;
        });

        // Exibe mensagem de "nenhum resultado" se necessário
        const semRes = document.getElementById('sem-resultado');
        document.getElementById('termo-busca').textContent = termo;
        semRes.style.display = (visiveis === 0 && termo !== '') ? 'block' : 'none';

        // Atualiza o contador com o número de produtos visíveis
        document.getElementById('contador-produtos').textContent = visiveis + ' produto(s)';
    }
</script>

</body>
</html>
