<?php

defined( 'ABSPATH' ) || exit;

if( ! class_exists('CC_Shortcode')){

    class CC_Shortcode{
        function __construct(){
            add_shortcode('cc_contatos', [$this, 'cc_shortcode_render']);
        }

        function cc_shortcode_render($atts){

         


            $atts = shortcode_atts(
                [   
                'quantidade'    => -1,
                'ordenacao'     => 'title',
                'mostrar_email' => true
                ], $atts, 'cc_contatos');

            return CC_Lista::render($atts);

        }

    }
}