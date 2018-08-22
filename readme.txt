=== Visual Term Description Editor ===
Contributors: bungeshea
Donate link: https://bungeshea.com/donate/
Tags: HTML Markup, tags, categories, terms, visual, TinyMCE, description, editor, rich text, wysiwyg, wpeditor
Requires at least: 3.3
Tested up to: 4.9.2
Requires PHP: 5.3
Stable tag: 1.8.0
License: MIT
License URI: https://opensource.org/licenses/MIT

Replaces the plain-text category and tag description editor with a visual editor.

== Description ==

-Replaces the term description editor with the WordPress TinyMCE visual editor, allowing you to use HTML in term descriptions and write them in rich text. Works on all taxonomies, including tags, categories and link categories, as well as custom taxonomies.

This plugin is multisite-compatible; if you would like to use it on every blog, network activate the plugin from the network dashboard. Otherwise, activate the plugin for individual sites.

This plugin's code is [available on GitHub](https://github.com/sheabunge/visual-term-description-editor). Please feel free to fork the repository and send a pull request. If you find a bug in the plugin, open an issue.

== Installation ==

= Simple Installation =

1. Search for 'Visual Term Description Editor' in the 'Plugins > Add New' menu and click 'Install'
2. Activate the plugin through the 'Plugins' menu in WordPress

= Manual Installation =

1. Download the [latest version of the plugin](https://downloads.wordpress.org/plugin/visual-term-description-editor.zip)
2. Upload the `visual-term-description-editor` directory to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Adding a new tag using the visual editor
2. Editing a tag using the visual editor
3. Viewing a tag archive page with the formatted tag description (using the Twenty Fourteen theme)

== Changelog ==

= 1.8.0 =
* Fixed: prevent description from persisting in editor field after adding a new term [[#](https://wordpress.org/support/topic/description-content-remains-after-adding-new-term-in-visual-mode/)]
* Fixed: always load underscore as a dependency of the word count script

= 1.7.0 =
* Added compatibility with qTranslate-X

= 1.6.0 =
* Disabled evaluation of shortcodes in the administration area
* Constrained image widths in description administration column

= 1.5.0 =
* Fixed action hooked to wrong method
* Added word count feature to visual editor
* Added a warning and graceful recovery if plugin is used on PHP < 5.4

= 1.4.2 =
* Update field HTML to match what is used in WordPress 4.5

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
