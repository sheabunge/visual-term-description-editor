<?php

/**
 * Plugin Name: Visual Term Description Editor
 * Plugin URI:  https://github.com/sheabunge/visual-term-description-editor
 * Description: Replaces the plain-text term (category, tag) description editor with a WYSIWYG visual editor
 * Author:      Shea Bunge
 * Author URI:  http://bungeshea.com
 * License:     MIT
 * License URI: http://opensource.com/licences/MIT
 * Version:     1.4.1
 */

namespace VTDE;

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require __DIR__ . '/vendor/autoload.php';

/**
 * @return Plugin
 */
function plugin() {
	static $plugin;

	if ( is_null( $plugin ) ) {
		$plugin = new Plugin();
	}

	return $plugin;
}

add_action( 'wp_loaded', array( plugin(), 'run' ), 999 );
