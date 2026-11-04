# Central de Contatos

Plugin para WordPress que centraliza o cadastro de contatos no painel administrativo e permite exibir uma lista no site usando o shortcode `[cc_contatos]`.

Ideal para criar uma página com contatos de uma equipe, empresas parceiras ou prestadores de serviço, mantendo os dados organizados em um único lugar.

## Funcionalidades

- Cadastro, edição e exclusão de contatos pelo menu **Contatos**.
- Campos para nome, telefone, e-mail, WhatsApp e empresa.
- Exibição dos contatos publicados em ordem alfabética pelo nome.
- Shortcode para inserir a listagem em páginas e posts.
- Página **Central de Contatos** para salvar um número geral de WhatsApp.
- Verificação de permissões, proteção por nonce, sanitização dos dados salvos e escape dos dados exibidos.

## Requisitos

Conforme os requisitos declarados no `readme.txt`:

- WordPress 6.0 ou superior.
- PHP 8.0 ou superior.

**Versão atual do plugin:** 1.1.1.

## Instalação

### Pela pasta de plugins

1. Baixe ou clone este repositório.
2. Coloque a pasta `central-de-contatos` dentro de `wp-content/plugins/` da sua instalação WordPress.
3. No painel do WordPress, acesse **Plugins → Plugins instalados**.
4. Localize **Central de Contatos** e clique em **Ativar**.

A estrutura deve ficar assim:

```text
wp-content/
└── plugins/
    └── central-de-contatos/
        ├── central-de-contatos.php
        ├── admin/
        ├── assets/
        └── includes/
```

### Pelo painel do WordPress

1. Prepare um arquivo ZIP contendo a pasta `central-de-contatos` com os arquivos do plugin.
2. Acesse **Plugins → Adicionar novo → Enviar plugin**.
3. Selecione o arquivo ZIP e clique em **Instalar agora**.
4. Após a instalação, clique em **Ativar plugin**.

## Como usar

### 1. Cadastre seus contatos

1. No painel do WordPress, abra o menu **Contatos**.
2. Clique em **Adicionar contato**.
3. Informe o nome do contato no título.
4. Na caixa **Dados do contato**, preencha os campos desejados:

| Campo | Exemplo |
| --- | --- |
| Telefone | (11) 3333-4444 |
| E-mail | contato@example.com |
| WhatsApp | 5511999999999 |
| Empresa | Empresa Exemplo |

5. Clique em **Publicar**. Para alterar um cadastro existente, edite o contato e clique em **Atualizar**.

### 2. Exiba os contatos no site

Abra a página ou o post em que deseja mostrar a lista, adicione um bloco **Shortcode** e insira:

```text
[cc_contatos]
```

Publique ou atualize a página. O plugin exibirá o nome de cada contato publicado, seguido de e-mail, telefone, WhatsApp e empresa, em ordem alfabética pelo nome.

O shortcode lista todos os contatos publicados, sem paginação, e atualmente não aceita parâmetros de filtro ou quantidade. Quando não há contatos publicados, exibe a mensagem “está vazio”.

### 3. Configure o número geral de WhatsApp

1. Acesse o menu **Central de Contatos** no painel.
2. Preencha o campo **Número do WhatsApp**.
3. Clique em **Salvar Opções**.

Essa configuração armazena um número geral separado dos números de cada contato. Na versão atual, esse número não é exibido pelo shortcode nem gera um botão de WhatsApp. Os dados da listagem são apresentados como texto, sem links automáticos para ligação, e-mail ou conversa.

## Tecnologias e organização

O plugin utiliza PHP e APIs nativas do WordPress:

- **Custom Post Type** `cc_contato` para os cadastros.
- **Post Meta** para os dados de cada contato.
- **Settings API** para a configuração geral de WhatsApp.
- **Shortcode API** para renderizar a listagem no site.

Os arquivos principais ficam organizados em:

| Caminho | Responsabilidade |
| --- | --- |
| `central-de-contatos.php` | Inicialização e informações do plugin. |
| `includes/class-cc-plugin.php` | Carregamento das classes, menu e ciclo de vida do plugin. |
| `includes/class-cc-cpt.php` | Registro do tipo de conteúdo e salvamento dos contatos. |
| `includes/class-cc-settings.php` | Configuração do número geral de WhatsApp. |
| `includes/class-cc-shortcode.php` | Exibição dos contatos pelo shortcode. |
| `admin/views/` | Formulários do painel administrativo. |

## Desativação e exclusão

Desativar o plugin mantém os contatos e as configurações no banco de dados.

**Atenção:** excluir o plugin pelo painel do WordPress remove permanentemente os contatos cadastrados pelo plugin, seus metadados e a configuração geral de WhatsApp. Faça um backup antes de excluir se precisar preservar essas informações.

## Contribuições

Sugestões, relatos de problemas e pull requests são bem-vindos. Para relatar um problema, descreva os passos para reproduzi-lo e informe as versões do WordPress, do PHP e do plugin.

## Autor

Desenvolvido por [Matheus de Souza dos Santos](https://github.com/matheus1810).

## Licença

GPLv2 ou posterior, conforme declarado no `readme.txt` do plugin.
