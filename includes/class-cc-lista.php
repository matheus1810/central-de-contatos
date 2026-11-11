<?php

defined( 'ABSPATH' ) || exit;

if( ! class_exists( 'CC_Lista' )){
    class CC_Lista{

        public static function render( $args = [] ){

        
            $defaults = [
                'quantidade'     => -1,
                'ordenacao'      => 'title',
                'mostrar_email'  => true,
            ];

            $args = wp_parse_args($args, $defaults);

            $quantidade = (int) $args[ 'quantidade' ];


            if( $quantidade < 1 ){
                $quantidade = -1;
            }

            $ordenacao = in_array($args['ordenacao'], ['title','date'], true) ? $args['ordenacao'] : 'title';

            $mostrar_email = (bool) $args[ 'mostrar_email' ];

            $consulta = [
                'post_type' => 'cc_contato',
                'posts_per_page' => $quantidade,
                'orderby' =>$ordenacao,
                'order' => 'title' === $ordenacao ? 'ASC' : 'DESC',
            ];

            $posts = get_posts($consulta);

            if( empty($posts) ){
                return '<p class="cc-contatos cc-contatos-vazio">' . esc_html__('Nenhum contato cadastrado','centra-de-contatos') . '</p>';
            }

            ob_start();

           
            foreach($posts as $post)   {
            

                $telefone = get_post_meta( $post->ID, 'cc_telefone', true );
                $email    = get_post_meta( $post->ID, 'cc_email', true );
                $whatsapp = get_post_meta( $post->ID, 'cc_whatsapp', true );
                $empresa  = get_post_meta( $post->ID, 'cc_empresa', true );
                    
                ?>
                    <h2> <?= esc_html($post->post_title) ?></h2>
                    <ul>
                        <li> <?= esc_html($email) ?> </li>
                        <li> <?= esc_html($telefone) ?> </li>
                        <li> <?= esc_html($whatsapp) ?> </li>
                        <li> <?= esc_html($empresa) ?> </li>
                    </ul>
                <?php

             }
             

             return ob_get_clean();


            
        }

    }
}