<?php

namespace VTDE;

/**
 * Base plugin class
 * @package VTDE
 */
class Plugin {

	/**
	 * @var Editor
	 */
	public $editor;

	/**
	 * Instantiates the class to work on all of the registered taxonomies
	 *
	 * @since 1.0
	 */
	function run() {
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_action( 'admin_head-edit-tags.php', 'fix_visual_term_description_editor_style' );

		/* Retrieve an array of registered taxonomies */
		$taxonomies = get_taxonomies( '', 'names' );
		$taxonomies = apply_filters( 'visual_term_description_taxonomies', $taxonomies );

		/* Initialize the class */
		$this->editor = new Editor( $taxonomies );
		$this->editor->run();
	}

	/**
	 * Fix the formatting buttons on the HTML section of
	 * the visual editor from being full-width
	 *
	 * @since 1.1
	 */
	function fix_visual_term_description_editor_style() {
		echo '<style>.quicktags-toolbar input { width: auto; }</style>';
	}

	/**
	 * Load up the localization file if we're using WordPress in a different language
	 */
	public function load_textdomain() {
		$domain = 'visual-term-description-editor';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		// wp-content/languages/visual-term-description-editor/visual-term-description-editor-[locale].mo
		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . "$domain/$domain-$locale.mo" );

		// wp-content/plugins/visual-term-description-editor/languages/visual-term-description-editor-[locale].mo
		$basename = plugin_basename( dirname( __DIR__ ) );
		load_plugin_textdomain( $domain, false, $basename . '/languages' );
	}
}
