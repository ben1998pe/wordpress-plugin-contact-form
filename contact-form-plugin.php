<?php
/*
Plugin Name: Contact Form AJAX
Description: Formulario de contacto con validación y envío por AJAX.
Version: 1.0
Author: ben1998pe
*/

register_activation_hook(__FILE__, 'cf_create_table');

function cf_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cf_messages';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nombre varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        mensaje text NOT NULL,
        fecha datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}


defined('ABSPATH') or die('¡Sin acceso directo!');

// Cargar scripts y estilos
function cf_enqueue_scripts() {
    wp_enqueue_style('cf-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_script('cf-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), null, true);
    wp_localize_script('cf-script', 'cf_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cf_ajax_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'cf_enqueue_scripts');

// Shortcode
function cf_render_form() {
    ob_start(); ?>
    <form id="cf-contact-form">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <textarea name="mensaje" placeholder="Mensaje" required></textarea>
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('cf_ajax_nonce'); ?>">
        <button type="submit">Enviar</button>
        <div id="cf-response"></div>
    </form>
    <?php return ob_get_clean();
}
add_shortcode('custom_contact_form', 'cf_render_form');

// Incluir handler
require_once plugin_dir_path(__FILE__) . 'includes/form-handler.php';

require_once plugin_dir_path(__FILE__) . 'includes/admin-page.php';
