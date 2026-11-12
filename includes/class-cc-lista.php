<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'CC_Lista' ) ) {
    class CC_Lista {

        public static function render( $args = array() ) {
            $args = wp_parse_args( $args, array(
                'quantidade'    => -1,
                'ordenacao'     => 'title',
                'mostrar_email' => true,
            ) );

            // valida: o que chega de fora não é confiável
            $quantidade = (int) $args['quantidade'];
            if ( $quantidade < 1 ) {
                $quantidade = -1;
            }
            $ordenacao     = in_array( $args['ordenacao'], array( 'title', 'date' ), true ) ? $args['ordenacao'] : 'title';
            $mostrar_email = (bool) $args['mostrar_email'];

            $contatos = get_posts( array(
                'post_type'      => 'cc_contato',
                'posts_per_page' => $quantidade,
                'orderby'        => $ordenacao,
                'order'          => 'title' === $ordenacao ? 'ASC' : 'DESC',
            ) );

            if ( empty( $contatos ) ) {
                return '<p class="cc-contatos cc-contatos--vazio">' . esc_html__( 'Nenhum contato cadastrado.', 'central-de-contatos' ) . '</p>';
            }

            ob_start();
            ?>
            <div class="cc-contatos">
                <?php foreach ( $contatos as $contato ) :
                    $telefone = get_post_meta( $contato->ID, 'cc_telefone', true );
                    $email    = get_post_meta( $contato->ID, 'cc_email', true );
                    $whatsapp = get_post_meta( $contato->ID, 'cc_whatsapp', true );
                    $empresa  = get_post_meta( $contato->ID, 'cc_empresa', true );
                    ?>
                    <div class="cc-contato">
                        <h3 class="cc-contato__nome"><?php echo esc_html( $contato->post_title ); ?></h3>
                        <ul class="cc-contato__dados">
                            <?php if ( $empresa ) : ?>
                                <li><?php echo esc_html( $empresa ); ?></li>
                            <?php endif; ?>
                            <?php if ( $telefone ) : ?>
                                <li><a href="<?php echo esc_url( 'tel:' . preg_replace( '/\D+/', '', $telefone ) ); ?>"><?php echo esc_html( $telefone ); ?></a></li>
                            <?php endif; ?>
                            <?php if ( $mostrar_email && $email ) : ?>
                                <li><a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a></li>
                            <?php endif; ?>
                            <?php if ( $whatsapp ) : ?>
                                <li><?php echo esc_html( $whatsapp ); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            return ob_get_clean();
        }
    }
}
