<?php
/**
 * Main loader file for Content.
 *
 * @package ContentVisibility
 */

namespace RichardTape\ContentVisibility;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\plugins_loaded__bv_loader' );

/**
 * Load the required bits and pieces for Content.
 *
 * @return void
 */
function plugins_loaded__bv_loader() {

	if ( is_admin() ) {

		require_once plugin_dir_path( __FILE__ ) . 'editor/class-editor.php';

		$bv_editor = new \RichardTape\ContentVisibility\Editor();
		$bv_editor->init();

		return;
	}

	require_once plugin_dir_path( __FILE__ ) . 'public/class-public-rules.php';

	$bv_public = new \RichardTape\ContentVisibility\Public_Rules();
	$bv_public->init();

}//end plugins_loaded__bv_loader()