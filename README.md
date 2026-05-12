# 🛒 Mercadão — Sistema de Gerenciamento de Produtos

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

<br>

Sistema web completo de gerenciamento de produtos desenvolvido em `PHP`, seguindo o padrão arquitetural `MVC`. O projeto foi desenvolvido como atividade prática para a disciplina de `Desenvolvimento Web` na `FATEC Praia Grande`, integrando back-end com banco de dados relacional e upload de imagens.<br>

## 🚀 Funcionalidades

- `Cadastro de Produtos:` Formulário completo com nome, quantidade, preço e foto do produto.
- `Upload de Imagens:` Validação e armazenamento de fotos dos produtos no servidor.
- `Loja Pública:` Vitrine de produtos com busca em tempo real, badges de estoque e cálculo de parcelamento.
- `Gerenciamento de Estoque:` Tabela administrativa com indicadores visuais de nível de estoque.
- `Edição de Produtos:` Atualização de nome, quantidade e preço com formulário pré-preenchido.
- `Exclusão de Produtos:` Remoção com confirmação antes de deletar.
- `Interface Responsiva:` Design adaptável para diferentes dispositivos.

<br>

## 🛠️ Tecnologias e Ferramentas

| Tecnologia | Uso |
|---|---|
| `PHP` | Lógica de negócio, CRUD e upload de arquivos |
| `PDO` | Conexão segura com o banco de dados (prepared statements) |
| `MySQL` | Armazenamento dos dados dos produtos |
| `HTML5 & CSS3` | Estruturação e estilização modular por página |
| `JavaScript` | Filtro de busca em tempo real na loja |
| `Git & GitHub` | Versionamento do projeto |

<br>

## 📂 Estrutura de Pastas

```
/
├── index.php                  # Página de cadastro de produto (raiz)
├── config/
│   └── conexao.php            # Conexão PDO e criação do banco/tabela
├── model/
│   └── produto.php            # Funções de CRUD (listar, buscar, inserir, atualizar, deletar)
├── controller/
│   ├── insert.php             # Processa cadastro e upload de foto
│   ├── update.php             # Processa edição do produto
│   └── delete.php             # Processa exclusão do produto
└── view/
    ├── loja.php               # Vitrine pública de produtos
    ├── produtos.php           # Painel de gerenciamento de estoque
    ├── editar.php             # Formulário de edição de produto
    ├── images/                # Fotos dos produtos cadastrados
    └── css/
        ├── global.css
        ├── index.css
        ├── loja.css
        ├── produtos.css
        └── editar.css
```

<br>

## ⚙️ Como Executar o Projeto

**Pré-requisitos:**
- Servidor local com PHP e MySQL (XAMPP, WAMP ou Laragon).

**Instalação:**

```
# Clone o repositório
git clone https://github.com/Carlosjun1or/DevWeb-Mercadao.git

# Mova para a pasta do servidor (ex: htdocs)
cd DevWeb-Mercadao
```

**Execução:**
1. Inicie o Apache e o MySQL no seu servidor local.
2. Acesse `http://localhost/DevWeb-Mercadao` no navegador.
3. O banco de dados e a tabela são criados automaticamente no primeiro acesso.

<br>

## 📚 Contexto Acadêmico

Este projeto foi desenvolvido para aplicar na prática os seguintes conceitos:

- Arquitetura **MVC** (Model, View, Controller) em PHP puro.
- Conexão e manipulação de banco de dados com **PDO** e *prepared statements*.
- Upload e validação de arquivos no servidor com `move_uploaded_file`.
- Uso de **Superglobais** (`$_POST`, `$_GET`, `$_FILES`).
- Separação de responsabilidades entre camadas do sistema.
- Estilização modular com **CSS** por componente/página.

<br>

## 👤 Autor

| Nome |
|---|
| [**Carlos Roberto**](https://github.com/Carlosjun1or) |
