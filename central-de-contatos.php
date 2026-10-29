<?php

/**
 * Plugin Name: Central de Contatos
 * Description: Plugin para gerenciamento centralizado de contatos, com organização, busca e integração simplificada.
 * Plugin URI: https://github.com/matheus1810/central-de-contatos
 * Version: 1.1.1
 * Author: Matheus de Souza dos Santos
 * Author URI: https://github.com/matheus1810/
 */

defined( 'ABSPATH' ) || exit;

        
define("CC_PATH", plugin_dir_path(__FILE__));
define("CC_URL", plugin_dir_url(__FILE__));
define("CC_VERSION", '1.1.1');

require_once(CC_PATH . 'includes/class-cc-plugin.php');

if (class_exists("CC_Plugin")) {
    $cc_plugin = new CC_Plugin();
    register_activation_hook(__FILE__, ['CC_Plugin', "activation"]);
    register_deactivation_hook(__FILE__, ['CC_Plugin', "deactivation"]);
    register_uninstall_hook(__FILE__, ['CC_Plugin', "uninstall"]);
}
