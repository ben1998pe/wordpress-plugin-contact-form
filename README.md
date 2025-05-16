# Contact Form Plugin for WordPress

Formulario de contacto personalizado con AJAX, validación y almacenamiento en base de datos.

---

## 🚀 Características

- Envío sin recargar la página (AJAX con jQuery)
- Validación de campos (nombre, correo y mensaje)
- Seguridad con `wp_nonce` para prevenir CSRF
- Guardado automático en la base de datos (`wp_cf_messages`)
- Panel de administración con:
  - Campo visual para configurar correo de envío
  - Listado completo de mensajes recibidos

---

## 📦 Instalación

1. Descarga este repositorio como ZIP o clónalo con Git.
2. Copia la carpeta del plugin a:  
   `wp-content/plugins/contact-form-plugin/`
3. Activa el plugin desde el panel de WordPress.

---

## 🧩 Uso

Agrega el siguiente shortcode en cualquier página o entrada para mostrar el formulario:

```shortcode
[custom_contact_form]
