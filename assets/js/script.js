
jQuery(document).ready(function($) {
    $('#cf-contact-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: cf_ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'cf_send_form',
                nombre: form.find('input[name="nombre"]').val(),
                email: form.find('input[name="email"]').val(),
                mensaje: form.find('textarea[name="mensaje"]').val(),
                nonce: form.find('input[name="nonce"]').val()
            },
            success: function(response) {
                $('#cf-response').text(response.data);
            },
            error: function() {
                $('#cf-response').text('Hubo un error. Intenta nuevamente.');
            }
        });
    });
});
