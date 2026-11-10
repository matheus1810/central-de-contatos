<?php

if( ! defined("ABSPATH")){
    return;
}

if( ! class_exists('CC_Blocks')){
    class CC_Blocks{
        function __construct(){
            add_action('init',[$this, 'cc_register_block']);
        }

         private $pasta_build = CC_PATH . 'build' ;
         private $arquivo_manifest = CC_PATH . 'build/blocks-manifest.php';

        public function  cc_register_block(){
            wp_register_block_types_from_metadata_collection( $this->pasta_build, $this->arquivo_manifest );
        }

    }
}