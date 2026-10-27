<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Central_De_Contatos_CPT' ) ) {
    class Central_De_Contatos_CPT {

        public function __construct() {
            add_action( 'init', array( $this, 'register_post_type' ) );
            add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        }

        public function register_post_type() {
            register_post_type(
                'cc_contato',
                array(
                    'labels' => array(
                        'name'          => 'Contatos',
                        'singular_name' => 'Contato',
                        'add_new_item'  => 'Adicionar contato',
                        'edit_item'     => 'Editar contato',
                    ),
                    'public'       => false,
                    'show_ui'      => true,
                    'show_in_rest' => true,
                    'menu_icon'    => 'dashicons-id',
                    'supports'     => array( 'title' ),
                )
            );
        }

        public function add_meta_box() {
            add_meta_box(
                'cc_contato_dados',
                'Dados do contato',
                array( $this, 'render_meta_box' ),
                'cc_contato'
            );
        }

        public function render_meta_box( $post ) {
            require CENTRAL_DE_CONTATOS_DIR_PATH . 'views/central-de-contatos-metabox.php';
        }
    }
}