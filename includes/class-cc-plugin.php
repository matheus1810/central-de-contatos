<?php

defined( 'ABSPATH' ) || exit;

if (! class_exists("CC_Plugin")) {
    class CC_Plugin
    {
        public function __construct()
        {

            add_action('admin_menu', [$this, 'add_menu']);

            require_once(CC_PATH . "includes/class-cc-settings.php");
            new CC_Settings();

            require_once CC_PATH . 'includes/class-cc-shortcode.php';
            New CC_Shortcode;

            require_once CC_PATH . 'includes/class-cc-cpt.php';
            new CC_Cpt();

        }

        public function add_menu()
        {
            add_menu_page(
                "Central de Contatos do Site",
                "Central de Contatos",
                "manage_options",
                'central_de_contatos_admin',
                [$this, 'central_de_contatos_admin_page'],
                'dashicons-megaphone',
                10
            );
        }

        public function central_de_contatos_admin_page()
        {
            require_once(CC_PATH . 'admin/views/cc-page.php');
        }


        public static function activation()
        {
            $cc_cpt = new CC_Cpt();

            $cc_cpt->register_post_type();


            flush_rewrite_rules();
        }

        public static function deactivation()
        {
            flush_rewrite_rules();
        }
        public static function uninstall() {

            delete_option('contatos_options');

            $posts_status = get_post_stati();

            $args = [
                'post_type'      => 'cc_contato',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
                'post_status'    => $posts_status
            ];

            $posts = get_posts($args);
      
            foreach ($posts as $post){
                wp_delete_post($post->ID, true);
            }
            
        }
    }
}