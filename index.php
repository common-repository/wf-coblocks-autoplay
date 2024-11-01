<?php
namespace WebFacing\CoBlocks;

/**
 * CoBlocks Post Carousel Block Autoplay for WordPress
 *
 * @package         	WebFacingCoBlocksPostCarouselBlockAutoplayPlugin
 * @author          	knutsp <knut@sparhell.no>
 * @copyright       	© 2022 Knut Sparhell, Nettvendt/IT-ing Sparhell, Norway
 * @license         	GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:     	WebFacing - Autoplay for Post Carousel Block from GoDaddy® CoBlocks
 * Description:     	🕸️ By WebFacing. Adds autoplay - and pause on hovering - to the Post Carousel Block from GoDaddy® CoBlocks plugin.
 * Plugin URI:      	https://webfacing.eu/
 * Version:         	1.0.4
 * Author:          	Knut Sparhell
 * Author URI:      	https://profiles.wordpress.org/knutsp/
 * License:         	GPL v2 or later
 * License URI:     	https://www.gnu.org/licenses/gpl-2.0.html
 * Requires PHP:    	7.3
 * Requires at least:   5.5
 * Tested up to:    	6.0
 * Requires Plugins:	coblocks
 * Domain Path:     	/languages
 * Text Domain:     	wf-coblocks-autoplay
 */

/**
 * Exit if accessed directly
 */
\defined( 'ABSPATH' ) || exit;

/**
 * Define non-magic constants inside the namespace pointing to this main plugin file
 */
const PLUGIN_DIR  = __DIR__;

const PLUGIN_FILE = __FILE__;

require_once 'includes/Main.php';

Main::load();

if ( \is_admin() ) {
	Main::admin();
}
