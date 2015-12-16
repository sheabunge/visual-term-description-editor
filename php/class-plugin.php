<?php
/**
 * Created by PhpStorm.
 * User: shea
 * Date: 16/12/15
 * Time: 12:14 PM
 */

namespace VTDE;


class Plugin {

	public $editor;

	/**
	 * Instantiates the class to work on all of the registered taxonomies
	 *
	 * @since 1.0
	 */
	function run() {

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
}