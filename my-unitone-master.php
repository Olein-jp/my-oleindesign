<?php
/**
 * Plugin Name: My unitone master
 * Description: WordPress プレミアムブロックテーマ unitone をカスタマイズするためのプラグイン
 * Version: 1.0.0
 *
 * @package my-unitone-master
 * @author Olein-jp
 * @license GPL-2.0+
 */

/**
 * テーマが unitone 以外の時はプラグインを無効化する
 */
$theme = wp_get_theme( get_template() );
if ( 'unitone' !== $theme->template ) {
	return;
}

/**
 * Directory URL
 */
define( 'MY_UNITONE_MASTER_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory Path
 */
define( 'MY_UNITONE_MASTER_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * Require files
 */
$my_unitone_master_dirs = [
	'functions',
	'block-patterns',
	'block-styles',
];

foreach ( $my_unitone_master_dirs as $dir ) {
	$dir_path = MY_UNITONE_MASTER_PATH . '/' . $dir . '/';

	if ( file_exists( $dir_path ) ) {
		opendir( $dir_path );

		$file = readdir();
		while ( false !== $file ) {
			if ( ! is_dir( $file ) && ( strtolower( substr( $file, - 4 ) ) === '.php' ) && ( substr( $file, 0, 1 ) !== '_' ) ) {
				$load_file = $dir_path . $file;
				require_once( $load_file );
			}
		}
		closedir();
	}
}
