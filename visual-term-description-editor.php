<?php

/**
 * Plugin Name: Visual Term Description Editor
 * Plugin URI:  https://github.com/sheabunge/visual-term-description-editor
 * Description: Replaces the plain-text term (category, tag) description editor with a WYSIWYG visual editor
 * Author:      Shea Bunge
 * Author URI:  https://bungeshea.com
 * License:     MIT
 * License URI: https://opensource.com/licences/MIT
 * Version:     1.7.0
 * Text Domain: visual-term-description-editor
 * Domain Path: /languages
 */


if ( version_compare( PHP_VERSION, '5.4.0', '>=' ) ) {
	require dirname( __FILE__ ) . '/load-plugin.php';
	return;
}

/**
 * Display a warning message and deactivate the plugin if the user is using an incompatible version of PHP
 * @since 1.5.0
 */
function vtde_php_upgrade_notice() {
	echo '<div class="error fade">',
		'<p><strong>', __( 'Visual Term Description Editor requires PHP 5.4 or later!', 'visual-term-description-editor' ), '</strong></p>',
		'<p>', __( ' Please upgrade your server to the latest version of PHP – contact your web host if you are unsure about how to do this.', 'visual-term-description-editor' ),  '</p>',
	'</div>';

	deactivate_plugins( plugin_basename( __FILE__ ) );
}

add_action( 'admin_notices', 'vtde_php_upgrade_notice' );
