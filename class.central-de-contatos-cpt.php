<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Central_De_Contatos_CPT' ) ) {
    class Central_De_Contatos_CPT {

        public function __construct() {
            add_action( 'init', array( $this, 'register_post_type' ) );
            add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );

            add_action('save_post_cc_contato', [$this, 'save_post_cc_contato'],10,2);

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

        public function save_post_cc_contato($post_id,$post){

            if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
                return;
            }

            if( ! current_user_can('edit_post',$post_id)){
                return;
            }

            if(wp_is_post_revision($post_id)){
                return;
            }


            if( ! isset($_POST['cc_contato_nonce']) || ! wp_verify_nonce($_POST['cc_contato_nonce'], 'cc_salvar_contato')) {
                return;
            }
           
            if(isset($_POST['cc_telefone'])){
                $telefone = sanitize_text_field(wp_unslash($_POST['cc_telefone']));
                update_post_meta($post_id, 'cc_telefone', $telefone);
            }

            if(isset($_POST['cc_email'])){
                $email = sanitize_email(wp_unslash($_POST['cc_email']));
                update_post_meta($post_id, 'cc_email', $email);
            }

            if(isset($_POST['cc_whatsapp'])){
                $whatsapp = sanitize_text_field(wp_unslash($_POST['cc_whatsapp']));
                update_post_meta($post_id, 'cc_whatsapp', $whatsapp);
            }

            if(isset($_POST['cc_empresa'])){
                $empresa = sanitize_text_field(wp_unslash($_POST['cc_empresa']));
                update_post_meta($post_id, 'cc_empresa', $empresa);
            }

        }
    }
}