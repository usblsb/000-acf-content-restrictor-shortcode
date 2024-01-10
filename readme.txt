=== 00 ACF Membership Level Content Restrictor ===
Contributors: [tu_nombre_de_usuario]
Tags: content restriction, membership, roles, capabilities, ACF
Requires at least: WP 4.7
Tested up to: WP 5.7
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Restringe el contenido basado en roles, capacidades y niveles de membresía específicos utilizando campos de ACF.

== Description ==

El plugin 00 ACF Membership Level Content Restrictor permite restringir el contenido en tus páginas y publicaciones de WordPress basándose en roles de usuario, capacidades específicas y niveles de membresía. Utilizando el popular plugin Advanced Custom Fields (ACF), este plugin extiende la funcionalidad permitiéndote mostrar contenido personalizado a diferentes usuarios.

== Features ==

- Restricción de contenido basada en roles de usuario.
- Comprobación de capacidades específicas para acceso a contenido.
- Verificación de niveles de membresía activos para mostrar contenido.
- Integración con Advanced Custom Fields (ACF) para mostrar contenido personalizado.
- Soporte para el plugin Restrict Content Pro.

== Installation ==

1. Sube los archivos del plugin al directorio `/wp-content/plugins/`, o instala el plugin directamente a través de la pantalla de plugins de WordPress.
2. Activa el plugin a través de la pantalla 'Plugins' en WordPress.
3. Usa el shortcode `[acf_membership_level_content_restrictor]` en tus páginas o entradas para restringir el contenido.

== Usage ==

Para usar el plugin, añade el shortcode `[acf_membership_level_content_restrictor role="rol_deseado" capability="capacidad_deseada" membership_levels="1,2"]` en tu contenido. Dentro de los parámetros del shortcode, puedes especificar roles, capacidades y niveles de membresía.

Ejemplo de uso:
[acf_membership_level_content_restrictor role="subscriber" capability="read" membership_levels="1"]
Aquí tu contenido restringido.
[/acf_membership_level_content_restrictor]


== Frequently Asked Questions ==

= ¿Es necesario tener ACF y Restrict Content Pro instalados para usar este plugin? =

Sí, este plugin requiere que tanto ACF como Restrict Content Pro estén instalados y activos para funcionar correctamente.

= ¿Puedo restringir cualquier tipo de contenido? =

Sí, puedes restringir cualquier contenido que se pueda incluir en una publicación o página de WordPress, incluyendo texto, imágenes y videos.

== Changelog ==

= 1.0 =
* Lanzamiento inicial.

== Upgrade Notice ==

= 1.0 =
Versión inicial.
