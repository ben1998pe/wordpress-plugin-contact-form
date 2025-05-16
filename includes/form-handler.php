<?php
add_action('wp_ajax_cf_send_form', 'cf_send_form');
add_action('wp_ajax_nopriv_cf_send_form', 'cf_send_form');

function cf_send_form() {
    check_ajax_referer('cf_ajax_nonce', 'nonce');

    $nombre = sanitize_text_field($_POST['nombre']);
    $email = sanitize_email($_POST['email']);
    $mensaje = sanitize_textarea_field($_POST['mensaje']);

    global $wpdb;
    $table = $wpdb->prefix . 'cf_messages';

    $wpdb->insert($table, array(
        'nombre' => $nombre,
        'email' => $email,
        'mensaje' => $mensaje
    ));

    wp_send_json_success('Formulario guardado correctamente en la base de datos');
}
