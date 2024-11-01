<?php
namespace WebFacing\CoBlocks;

/**
 * Exit if accessed directly
 */
\class_exists( 'WP' ) || exit;

abstract class Plugin {

	const pf = 'wf_';

	protected static $is_debug;

	protected static $plugin;

	protected static $pf;

	public    static $text_domain;

	protected static $has_coblocks;

	protected static $block_cat;

	protected static $block_name;

	protected static $block_slug;

	protected static $action;

	public    static function load() {

		if ( ! \function_exists( 'get_plugin_data' ) ) {
			require_once \ABSPATH . 'wp-admin/includes/plugin.php';
		}

		self::$is_debug   = \defined( 'WF_DEBUG' ) && \WF_DEBUG;

		self::$pf         = \str_replace( '_', '-', self::pf );

		self::$block_cat  = 'coblocks';

		self::$block_name = 'post-carousel';

		self::$action     = 'autoplay';

		self::$block_slug = self::pf . self::$block_cat . '-' . self::$block_name . '_' . self::$action;

		\add_action( 'wp_enqueue_scripts', static function(): void {

			if ( \has_block( self::$block_cat . '/' . self::$block_name ) ) {
				$handle = self::$pf . self::$action;
				\wp_register_script( $handle, \plugin_dir_url( PLUGIN_FILE ) . '/public/js/' . self::$action . '.js', false );

				\wp_localize_script( $handle, 'wfCoBlocksAutoplaySettings', [
					'carouselClass' => self::$block_cat . '-' . self::$block_name,
					'cssClass'      => (string) \apply_filters( self::$block_slug. '_class'       ,   '' ),
					'interval'      =>    (int) \apply_filters( self::$block_slug. '_interval'    ,    5 ),
					'pauseOnHover'  =>   (bool) \apply_filters( self::$block_slug. '_pauseonhover', true ),
				] );
				\wp_enqueue_script ( $handle );
			}
		} );
	}

	public static function admin_load() {

		self::$plugin = (object) \get_plugin_data( PLUGIN_FILE );

		\add_action( 'plugins_loaded', static function(): void {
			self::$has_coblocks = \class_exists( 'CoBlocks' );
		} );

		\add_action( 'admin_notices', static function(): void {

			if ( ! self::$has_coblocks && \current_user_can( 'activate_plugins' ) ) { ?>
			<div class="notice notice-error is-dismissible">
				<p><?php \printf(
					\_x( 'The "%1$s" plugin is not active. You should deactivate the "%2$s" plugin because it depends on the former to work.',
						'%1$s, = Dependency Plugin Name, %2$ = This Plugin Name',
						self::$text_domain ),
					\_x( 'Page Builder Gutenberg Blocks – CoBlocks',
						'Dependency Plugin Name',
						self::$text_domain ),
					self::$plugin->Name,
					); ?>
				</p>
			</div>
<?php		} elseif ( self::$is_debug ) { ?>
				<div class="notice notice-success is-dismissible">
					<p>
						<?php echo self::$plugin->Name, ' ', self::$plugin->Version; ?>
					</p>
				</div>
<?php
			}
		} );
	}
}
