<?php

if( ! defined("ABSPATH")){
    return;
}

if( ! class_exists('CC_Shortcode')){

    class CC_Shortcode{
        function __construct(){
            add_shortcode('cc_contatos', [$this, 'cc_shortcode_render']);
        }

        function cc_shortcode_render($attr){
            $args = [
                'post_type'      => 'cc_contato',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC'
            ];

            $posts = get_posts($args);

            if(  empty($posts)){
                return 'está vazio';
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
                        <li> <?= esc_html($telefone) ?> </li>
                        <li> <?= esc_html($email) ?> </li>
                        <li> <?= esc_html($whatsapp) ?> </li>
                        <li> <?= esc_html($empresa) ?> </li>
                    </ul>
                <?php

                
           
             }
             

             return ob_get_clean();

        
        }

    }
}