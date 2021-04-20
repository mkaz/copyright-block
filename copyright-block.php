<?php
/**
 * Plugin Name:       Copyright Block
 * Description:       A block to insert the Copyright with current year.
 * Requires at least: 5.7
 * Requires PHP:      7.0
 * Version:           0.1.1
 * Author:            Marcus Kazmierczak
 * Author URI:        https://mkaz.blog/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       copyright-block
 *
 * @package           mkaz
 */

function mkaz_copyright_block_block_init() {
	$dir = __DIR__;

	$index_js = 'index.js';
	wp_register_script(
		'mkaz-copyright-block-block-editor',
		plugins_url( $index_js, __FILE__ ),
		array(
			'wp-block-editor',
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
		filemtime( "$dir/$index_js" )
	);
	wp_set_script_translations( 'mkaz-copyright-block-block-editor', 'copyright-block' );

	register_block_type(
		'mkaz/copyright-block',
		array(
			'editor_script' => 'mkaz-copyright-block-block-editor',
			'render_callback' => 'mkaz_copyright_block_render',
		)
	);
}
add_action( 'init', 'mkaz_copyright_block_block_init' );


function mkaz_copyright_block_render() {
	$year = date('Y');
	return __("Copyright", "copyright-block") . " © " . $year;
}
