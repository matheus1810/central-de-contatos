<?php

/**
 * Plugin Name: Central de Contatos
 * Description: Plugin para gerenciamento centralizado de contatos, com organização, busca e integração simplificada.
 * Plugin URI: https://github.com/matheus1810/central-de-contatos
 * Version: 1.0.0
 * Author: Matheus de Souza dos Santos
 * Author URI: https://github.com/matheus1810/
 */

if (! defined("ABSPATH")) {
    exit;
}

if (! class_exists("Central_De_Contatos")) {
    class Central_De_Contatos
    {
        public function __construct()
        {
            $this->define_constants();

            add_action('admin_menu', [$this, 'add_menu']);

            require_once(CENTRAL_DE_CONTATOS_DIR_PATH . "class.central-de-contatos-settings.php");
            $central_de_contatos_settings = new Central_De_Contatos_Settings();
        }

        public function define_constants()
        {
            define("CENTRAL_DE_CONTATOS_DIR_PATH", plugin_dir_path(__FILE__));
            define("CENTRAL_DE_CONTATOS_DIR_URL", plugin_dir_url(__FILE__));
            define("CENTRAL_DE_CONTATOS_VERSION", '1.0.0');
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
            require_once(CENTRAL_DE_CONTATOS_DIR_PATH . '/views/central-de-contatos-page.php');
        }


        public static function activation()
        {
            update_option("rewrite_rules", '');
        }
        public static function deactivation()
        {
            flush_rewrite_rules();
        }
        public static function uninstall() {}
    }
}


if (class_exists("Central_De_Contatos")) {
    $central_de_contatos = new Central_De_Contatos;
    register_activation_hook(__FILE__, [$central_de_contatos, "activation"]);
    register_deactivation_hook(__FILE__, [$central_de_contatos, "deactivation"]);
    register_uninstall_hook(__FILE__, [$central_de_contatos, "uninstall"]);
}
