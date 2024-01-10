<?php
/**
 * Plugin Name: 000 ACF Restrict Content Pro Restrictor Shortcode
 * Plugin URI: https://webyblog.es/
 * Description: Restringe el contenido basado en roles, capacidades de WordPress y niveles de membresía específicos utilizadas de Restrict Content Pro para mostrar campos de ACF usando el shortcode: [acf_membership_level_content_restrictor role="role_de_wordpress_deseado" capability="capacidad_de_wordpress_deseada" membership_levels="1,2"]
 * Version: 10-01-2024
 * Author: Juan Luis Martel
 * Author URI: https://www.webyblog.es
 * License: GPLv3 or later
 */


// Prevenir acceso directo al archivo del plugin
if ( ! defined( 'ABSPATH' ) ) exit;


function jlmr_enqueue_acf_content_restrictor_shortcode_styles() {
    // Obtén la URL del archivo CSS en la misma carpeta que el archivo del plugin
    $css_url = plugin_dir_url( __FILE__ ) . '00-acf-content-restrictor-shortcode.css';
    // Encola la hoja de estilos
    wp_enqueue_style( 'jlmr-acf-content-restrictor-style', $css_url, array(), '1.0.0' );
}
// Añade la función al hook wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'jlmr_enqueue_acf_content_restrictor_shortcode_styles' );


function jlmr_acf_membership_level_content_restrictor_shortcode($atts) {
    $atts = shortcode_atts(array(
        'role' => '',
        'capability' => '',
        'membership_levels' => ''
    ), $atts, 'acf_membership_level_content_restrictor');

    // Comprobar si Restrict Content Pro está activo.
    if ( ! function_exists( 'rcp_user_has_active_membership' ) || ! function_exists( 'rcp_is_pending_verification' ) ) {
        return '<div class="jlmr-acf-rcp-mensaje"><h3>ERROR-001: Sistema de Restricción apagado.</h3><p>Espere 2 horas y si el error continua contacte con el administrador de la web usando el formulario de contacto.</p></div>';
    }

    // Verificar si el usuario está logueado.
    if ( ! is_user_logged_in() ) {
	    return '
        <div class="jlmr-acf-rcp-mensaje">
            <h3>Parte del contenido que quieres ver está oculto solo a usuarios Premium</h3>
            <div class="jlmr-acf-rcp-buttons">
            	<a href="/web-registro/" rel="noopener noreferrer nofollow" class="jlmr-acf-rcp-button-style">Suscribirse</a>
            	<a href="/wp-login.php" rel="noopener noreferrer nofollow" class="jlmr-acf-rcp-button-style">Acceder</a>
            </div>
        </div>';
    }

    $user = wp_get_current_user();

    // Verificar el role y capacidad de usuario en WordPress.
    if ( ! in_array( $atts['role'], (array) $user->roles ) || ! current_user_can( $atts['capability'] ) ) {
        return '<div class="jlmr-acf-rcp-mensaje"><h3>No tienes permiso para ver este contenido.</h3></div>';
    }

    // Verificar si el usuario tiene una membresía activa en Restrict Content Pro.
    if ( ! rcp_user_has_active_membership() ) {
        return '<div class="jlmr-acf-rcp-mensaje"><h3>Tu cuenta no cumple con los requisitos necesarios para ver este contenido.</h3><p><b>- No tienes una membresía activa:</b> Si eres una persona nueva en la academia puede que aun no se haya procesado tu registro, espera <b>2 horas</b> y si aun continua el fallo contacta con el administrador explicando tu problema.<p><b>- Tienes una membresía vencida:</b> Puede ser que tu membresía este caducada, no se ha podido realizar el cobro o este finalizada, solo los usuarios con una cuenta activa pueden ver el contenido privado, si lo deseas puedes activar tu membresía desde el <b>Escritorio</b> para cualquier otra duda puedes contactar desde el formulario de contacto.</p></div>';

    }

    // Verificar si el usuario está pendiente de verificación de correo electrónico enviado por Restrict Content Pro.
    if ( rcp_is_pending_verification() ) {
        return '<div class="jlmr-acf-rcp-mensaje"><h3>Para acceder debes de verificar tu dirección de correo electrónico en el email que has recibido.</h3><p>Ve a tu correo y pulsa sobre el link que te hemos enviado para que verifiques tus datos.</p><p>Recuerda mirar en la carpeta de <b>Spam o publicidad</b>.</p></div>';

    }

    // Verificar los niveles de membresía si están especificados.
    if ($atts['membership_levels']) {
        $membership_levels = explode(',', $atts['membership_levels']);
        $user_membership_levels = rcp_get_customer_membership_level_ids();

        if (!count(array_intersect($user_membership_levels, $membership_levels))) {
            return '<div class="jlmr-acf-rcp-mensaje"><h3>No tienes el nivel de membresía requerido para ver este contenido.</h3></div>';
        }
    }

    // Si todas las condiciones se cumplen, se muestran los campos de ACF del contenido protegido.
        // Poner aqui los campos de ACF que queremos mostrar usando el shortcode
	    $contenido_privado = get_field('jl_contenido_privado_wysiwyg');
	    $video_privado = get_field('jl_video_privado');
        // Poner aqui los campos de las variables de arriba de ACF que queremos mostrar usando el shortcode
	    $html = "<div class='jlmr-acf-rcp-contenido-privado'>" . $contenido_privado . "</div>";
	    $html .= "<div class='jlmr-acf-rcp-video-privado'>" . $video_privado . "</div>";
    return $html;


}

add_shortcode('acf_membership_level_content_restrictor', 'jlmr_acf_membership_level_content_restrictor_shortcode');
