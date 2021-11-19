<?php

namespace VTDE;

/**
 * This file handles the actual loading of the plugin
 */

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
		$plugin = new Plugin( __FILE__ );
	}

	return $plugin;
}

add_action( 'wp_loaded', array( plugin(), 'run' ), 999 );
