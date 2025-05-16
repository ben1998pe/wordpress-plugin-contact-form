<?php
// Añadir menú en el admin
add_action('admin_menu', 'cf_admin_menu');
function cf_admin_menu() {
    add_menu_page(
        'Formulario Contacto',
        'Formulario Contacto',
        'manage_options',
        'cf-contact-form',
        'cf_admin_page',
        'dashicons-email',
        25
    );
}

// Página de configuración y mensajes
function cf_admin_page() {
    global $wpdb;
    $table = $wpdb->prefix . 'cf_messages';

    // Guardar correo de envío (visual solamente)
    if (isset($_POST['cf_email']) && check_admin_referer('cf_save_email', 'cf_email_nonce')) {
        update_option('cf_contact_email', sanitize_email($_POST['cf_email']));
        echo '<div class="updated"><p>Correo guardado (no funcional en esta demo).</p></div>';
    }

    $email = get_option('cf_contact_email', '');
    $mensajes = $wpdb->get_results("SELECT * FROM $table ORDER BY fecha DESC");

    ?>
    <div class="wrap">
        <h1>Formulario de Contacto</h1>

        <h2>1. Correo de envío</h2>
        <form method="post">
            <?php wp_nonce_field('cf_save_email', 'cf_email_nonce'); ?>
            <input type="email" name="cf_email" value="<?php echo esc_attr($email); ?>" style="width:300px;" placeholder="correo@ejemplo.com" />
            <button type="submit" class="button button-primary">Guardar</button>
        </form>

        <hr>

        <h2>2. Mensajes recibidos</h2>
        <table class="widefat fixed striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($mensajes): ?>
                    <?php foreach ($mensajes as $m): ?>
                        <tr>
                            <td><?php echo esc_html($m->nombre); ?></td>
                            <td><?php echo esc_html($m->email); ?></td>
                            <td><?php echo esc_html($m->mensaje); ?></td>
                            <td><?php echo esc_html($m->fecha); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">No hay mensajes registrados aún.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php
}
