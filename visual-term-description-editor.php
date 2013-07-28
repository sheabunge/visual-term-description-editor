<?php

/**
 * Plugin Name: Visual Term Description Editor
 * Plugin URI:  https://github.com/bungeshea/visual-term-description-editor
 * Description: Replaces the plain-text term (category, tag) description editor with a WYSIWYG visual editor
 * Author:      Shea Bunge
 * Author URI:  http://bungeshea.com
 * License:     MIT
 * License URI: http://opensource.com/licences/MIT
 * Version:     1.0
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) )
	exit;

class Visual_Term_Description_Editor {

	/**
	 * The taxonomies which should use the visual editor
	 *
	 * @since 1.0
	 * @var   array
	 */
	public $taxonomies ;

	/**
	 * The constructor function for the class
	 *
	 * @since  1.0
	 * @access public
	 * @param  array $taxonomies The taxonomies which should use a visual editor
	 * @return void
	 */
	public function __construct( $taxonomies ) {

		/* Only users with the "unfiltered_html" capability can use this feature */
		if ( ! current_user_can( 'unfiltered_html' ) )
			return;

		/* Setup the class variables */
		$this->taxonomies = (array) $taxonomies;

		/* Remove the filters which disallow HTML in term descriptions */
		remove_filter( 'pre_term_description', 'wp_filter_kses' );
		remove_filter( 'term_description', 'wp_kses_data' );

		/* Loop through the taxonomies, adding actions */
		foreach ( $this->taxonomies as $taxonomy ) {
			add_action( $taxonomy . '_edit_form_fields', array( $this, 'render_field_edit' ), 1, 2 );
			add_action( $taxonomy . '_add_form_fields', array( $this, 'render_field_add' ), 1, 1 );
		}
	}

	/**
	 * Add the visual editor to the edit tag screen
	 *
	 * @since  1.0
	 * @access public
	 * @param  object $tag      The tag currently being edited
	 * @param  string $taxonomy The taxonomy that the tag belongs to
	 * @return void
	 */
	public function render_field_edit( $tag, $taxonomy ) {

		$settings = array(
			'quicktags'     => array( 'buttons' => 'em,strong,link' ),
			'textarea_name' => 'description',
			'quicktags'     => true,
			'tinymce'       => true,
			'editor_css'    => '<style>#wp-html-description-editor-container .wp-editor-area { height: 250px; }</style>'
		);

		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="description"><?php _ex( 'Description', 'Taxonomy Description' ); ?></label></th>
			<td><?php wp_editor( htmlspecialchars_decode( $tag->description ), 'html-description', $settings ); ?>
			<span class="description"><?php _e( 'The description is not prominent by default, however some themes may show it.' ); ?></span></td>
			<script type="text/javascript">
				// Remove the non-html field
				jQuery( 'textarea#description' ).closest( '.form-field' ).remove();
			</script>
		</tr>
		<?php
	}

	/**
	 * Add the visual editor to the add new tag screen
	 *
	 * @since  1.0
	 * @access public
	 * @param  string $taxonomy The taxonomy that a new tag is being added to
	 * @return void
	 */
	public function render_field_add( $taxonomy ) {

		$settings = array(
			'quicktags'    => array( 'buttons' => 'em,strong,link' ),
			'textarea_name'=> 'description',
			'quicktags'    => true,
			'tinymce'      => true,
			'editor_css'   => '<style>#wp-html-tag-description-editor-container .wp-editor-area { height: 150px; }</style>'
		);

		?>
		<div>
			<label for="tag-description"><?php _ex( 'Description', 'Taxonomy Description' ); ?></label>
			<?php wp_editor( '', 'html-tag-description', $settings ); ?>
			<p class="description"><?php _e( 'The description is not prominent by default, however some themes may show it.' ); ?></p>
			<script type="text/javascript">
				// Remove the non-html field
				jQuery( 'textarea#tag-description' ).closest( '.form-field' ).remove();

				jQuery(function() {
					// Trigger save
					jQuery( '#addtag' ).on( 'mousedown', '#submit', function() {
				   		tinyMCE.triggerSave();
				    });
			    });

			</script>
		</div>
		<?php
	}

}

/**
 * Instantiates the class to work on all of the registered taxonomies
 *
 * @since  1.0
 * @access public
 * @return void
 */
function visual_term_description_editor() {

	/* Retrieve an array of registered taxonomies */
	$taxonomies = get_taxonomies( '', 'names' );

	/* Initialize the class */
	$GLOBALS['visual-term-description-editor'] = new Visual_Term_Description_Editor( $taxonomies );
}
add_action( 'init', 'visual_term_description_editor' );
