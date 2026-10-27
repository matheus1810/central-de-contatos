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
        <th><label for="cc_telefone">Telefone</label></th>
        <td><input type="text" id="cc_telefone" name="cc_telefone" class="regular-text" value="<?php echo esc_attr( $telefone ); ?>"></td>
    </tr>
    <tr>
        <th><label for="cc_email">E-mail</label></th>
        <td><input type="email" id="cc_email" name="cc_email" class="regular-text" value="<?php echo esc_attr( $email ); ?>"></td>
    </tr>
    <tr>
        <th><label for="cc_whatsapp">WhatsApp</label></th>
        <td><input type="text" id="cc_whatsapp" name="cc_whatsapp" class="regular-text" value="<?php echo esc_attr( $whatsapp ); ?>"></td>
    </tr>
    <tr>
        <th><label for="cc_empresa">Empresa</label></th>
        <td><input type="text" id="cc_empresa" name="cc_empresa" class="regular-text" value="<?php echo esc_attr( $empresa ); ?>"></td>
    </tr>
</table>