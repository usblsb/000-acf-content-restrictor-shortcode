# 000111 ACF Restrict Content Pro Restrictor Shortcode - ON IMPORTANTE

## Descripción
Este plugin para WordPress, titulado "000111 ACF Restrict Content Pro Restrictor Shortcode - ON IMPORTANTE", permite restringir contenido basado en roles, capacidades de WordPress y niveles de membresía específicos de Restrict Content Pro. Utiliza un shortcode `[acf_membership_level_content_restrictor]` para mostrar campos de Advanced Custom Fields (ACF) de acuerdo a estas restricciones. Es una herramienta útil para sitios que requieren un control de acceso detallado a su contenido.

## Tabla de Contenidos
- [Instalación](#instalación)
- [Uso](#uso)
- [Ejemplos](#ejemplos)
- [Personalización](#personalización)
- [Documentación Adicional](#documentación-adicional)
- [Advertencias](#advertencias)
- [Licencia](#licencia)
- [Estado del Proyecto](#estado-del-proyecto)
- [Créditos](#créditos)
- [Capturas de Pantalla](#capturas-de-pantalla)

## Instalación
1. Descarga el archivo ZIP del plugin desde [nuestro sitio web](https://webyblog.es/).
2. En tu panel de administración de WordPress, ve a Plugins > Añadir Nuevo.
3. Elige la opción "Subir Plugin" y selecciona el archivo ZIP descargado.
4. Activa el plugin una vez instalado.

## Uso
El plugin se usa mediante el shortcode `[acf_membership_level_content_restrictor]`. Puedes especificar roles, capacidades y niveles de membresía como atributos del shortcode para controlar quién puede ver el contenido.

## Ejemplos
Aquí hay un ejemplo de cómo usar el shortcode:
```php
[acf_membership_level_content_restrictor role="subscriber" capability="read" membership_levels="1,2"]
```
Este shortcode mostrará el contenido solo a usuarios con el rol de 'subscriber', la capacidad de 'read' y que estén en los niveles de membresía 1 o 2.

## Personalización
Puedes personalizar el shortcode añadiendo o modificando los atributos de roles, capacidades y niveles de membresía.

## Documentación Adicional
Para más información, visita nuestra [página de documentación](https://webyblog.es).

## Advertencias
Este plugin se proporciona "tal cual" y no nos hacemos responsables del uso del mismo ni de los daños que puedan ocasionarse como resultado de su uso.

## Licencia
Este plugin se distribuye bajo la Licencia General Public License (GPL).

## Estado del Proyecto
Este proyecto se encuentra en desarrollo activo.

## Créditos
Desarrollado por Juan Luis Martel. Visita su sitio web para más información: [Juan Luis Martel](https://www.webyblog.es).

## Capturas de Pantalla
*Capturas de pantalla próximamente.*

Recuerda adaptar y complementar este README.md según las necesidades específicas de tu proyecto y la evolución del mismo.