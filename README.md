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

    [custom_contact_form]

---

## 🖥️ Panel de Administración

Ve a **Formulario Contacto** en el menú del administrador de WordPress para:

- Configurar el correo de envío (actualmente solo visual)
- Ver los mensajes enviados

---

## 📁 Base de datos

El plugin crea automáticamente una tabla llamada:

    wp_cf_messages

Con los campos:

- `nombre`
- `email`
- `mensaje`
- `fecha`

---

## 📌 Notas

- Esta versión **no envía correos reales** (ideal para pruebas locales).
- Recomendado extender con `wp_mail()` y validación adicional para producción.

---

## 📄 Licencia

Este plugin está disponible bajo la licencia MIT. ¡Puedes usarlo, modificarlo y adaptarlo a tus necesidades!

---

## ✨ Autor

Desarrollado por [@ben1998pe](https://github.com/ben1998pe)  
Hecho con ❤️ en WordPress + PHP
