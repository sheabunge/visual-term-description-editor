=== Visual Term Description Editor ===
Contributors: bungeshea
Donate link: http://bungeshea.com/donate/
Tags: tags, categories, terms, visual, TinyMCE, description, editor, rich text, wysiwyg, wpeditor
Requires at least: 3.3
Tested up to: 4.3
Stable tag: 1.4.1
License: MIT
License URI: http://opensource.org/licenses/MIT

Replaces the plain-text category and tag description editor with a visual editor.

== Description ==

Replaces the term description editor with the WordPress TinyMCE visual editor, allowing you to use HTML in term descriptions and write them in rich text. Works on all taxonomies, including tags, categories and link categories, as well as custom taxonomies.

This plugin is multisite-compatible; if you would like to use it on every blog, network activate the plugin from the network dashboard. Otherwise, activate the plugin for individual sites.

This plugin's code is [available on GitHub](https://github.com/sheabunge/visual-term-description-editor). Please feel free to fork the repository and send a pull request. If you find a bug in the plugin, open an issue.

== Installation ==

1. Upload `visual-term-description-editor.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Done!

== Screenshots ==

1. Adding a new tag using the visual editor
2. Editing a tag using the visual editor
3. Viewing a tag archive page with the formatted tag description (using the Twenty Fourteen theme)

== Changelog ==

= 1.4.1 =
* Update HTML elements and class names to match latest version of WordPress (props to [@ThatStevensGuy](https://github.com/ThatStevensGuy))

= 1.4.0 =
* Add `visual_term_description_taxonomies` filter
* Add support for oEmbed in term description

= 1.3 =
* Add visual editor for administrators without the `unfiltered_html` cap [[#](https://wordpress.org/support/topic/multisite-user-issues?replies=6#post-4820263)]

= 1.2 =
* Evaluate shortcodes in term description
* Convert smilies in term descriptions
* Unsimplify add term editor [#](https://wordpress.org/support/topic/wysiwyg-on-create-taxonomy-page)

= 1.1.1 =
* Load plugin as late as possible to ensure all custom taxonomies are registered

= 1.1 =
* Fix text (HTML) editor buttons from displaying full width
* Stripped down add term editor
* Updated screenshots for WordPress 3.9

= 1.0 =
* Initial release
