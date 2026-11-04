<?php

defined( 'ABSPATH' ) || exit;

if (isset($_GET['settings-updated'])) {
    add_settings_error(
        'contatos_options', 
        'mensagem', 
        __('Salvo com sucesso!','central-de-contatos'), 
        'success'
    );
}
settings_errors('contatos_options');

?>



<div class="wrap">

    <h1><?= esc_html(get_admin_page_title()); ?></h1>


    <form action="options.php" method="post">
        <?php
        settings_fields('contatos_group');
        do_settings_sections('central_de_contatos_page');
        submit_button(__('Salvar Opções', 'central-de-contatos'));
        ?>

    </form>
</div>

