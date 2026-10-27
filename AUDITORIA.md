Arquivo | Linha / trecho | Problema | Corrigido? |
|---|---|---|---|
| `central-de-contatos.php` | `register_uninstall_hook(__FILE__, [$central_de_contatos, ...])` | Passa objeto. WP ignora e dispara `_doing_it_wrong` | ✅|
| `central-de-contatos.php` | `public static function uninstall() {}` | Vazio. A option `contatos_options` nunca é apagada | ✅ |
| `central-de-contatos.php` | `update_option("rewrite_rules", '')` na ativação | Funciona, mas o certo é `flush_rewrite_rules()` | ✅ |
| `class.central-de-contatos-settings.php` | `register_setting('contatos_group', 'contatos_options')` | Sem `sanitize_callback`. O valor entra no banco sem tratamento | ⬜ |
| `class.central-de-contatos-settings.php` | `<input ... value="...">` | A tag `<input` nunca fecha com `>` | ⬜ |
| `views/*.php` e `class.*.php` | strings soltas | Sem textdomain. Fica para a Sessão 5 | ⬜ |