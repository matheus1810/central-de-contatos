<?php
defined( 'ABSPATH' ) || exit;

$telefone = get_post_meta( $post->ID, 'cc_telefone', true );
$email    = get_post_meta( $post->ID, 'cc_email', true );
$whatsapp = get_post_meta( $post->ID, 'cc_whatsapp', true );
$empresa  = get_post_meta( $post->ID, 'cc_empresa', true );

wp_nonce_field( 'cc_salvar_contato', 'cc_contato_nonce' );
?>
<table class="form-table">
    <tr>
        <th><label for="cc_telefone"><?php esc_html_e("Telefone",'central-de-contatos') ?> </label></th>
        <td><input type="text" id="cc_telefone" name="cc_telefone" class="regular-text" value="<?php echo esc_attr( $telefone ); ?>"></td>
    </tr>
    <tr>
        <th><label for="cc_email"> <?php esc_html_e("Email",'central-de-contatos') ?>  </label></th>
        <td><input type="email" id="cc_email" name="cc_email" class="regular-text" value="<?php echo esc_attr( $email ); ?>"></td>
    </tr>
    <tr>
        <th><label for="cc_whatsapp">  <?php esc_html_e("WhatsApp",'central-de-contatos') ?>  </label></th>
        <td><input type="text" id="cc_whatsapp" name="cc_whatsapp" class="regular-text" value="<?php echo esc_attr( $whatsapp ); ?>"></td>
    </tr>
    <tr>
        <th><label for="cc_empresa"> <?php esc_html_e("Empresa",'central-de-contatos') ?>  </label></th>
        <td><input type="text" id="cc_empresa" name="cc_empresa" class="regular-text" value="<?php echo esc_attr( $empresa ); ?>"></td>
    </tr>
</table>