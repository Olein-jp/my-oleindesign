<?php
/**
 * Plugin Name: My Olein Design
 * Description: unitone を使っているオレインデザインサイトのカスタマイズ用プラグイン
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

add_action(
	'wp_enqueue_scripts',
	function () {
		/* 基本CSS読み込み */
		wp_enqueue_style(
			'my-unitone-master-style',
			MY_UNITONE_MASTER_URL . '/build/css/style.css',
			null,
			filemtime( MY_UNITONE_MASTER_PATH . '/build/css/style.css' )
		);

		/* 基本JS読み込み */
//		wp_enqueue_script(
//			'my-unitone-master-script',
//			MY_UNITONE_MASTER_URL . '/build/js/script.js',
//			null,
//			filemtime( MY_UNITONE_MASTER_PATH . '/build/js/script.js' ),
//			true
//		);
	}
);

/**
 * 編集画面用CSS対応と読み込み
 */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'editor-styles' );
		add_editor_style( MY_UNITONE_MASTER_URL . '/build/css/editor-style.css' );
	}
);

/**
 * Snow Monkey Editor の機能を unitone ブロックにも適応させる
 */
add_action(
	'admin_enqueue_scripts',
	function() {
		$data = "wp.hooks.addFilter(
			'SnowMonkeyEditor.extension.allowedNameSpaces',
			'my-oleindesign/apply-snow-monkey-editor-extensions',
			( allowedNameSpaces ) => {
				return [
					...allowedNameSpaces,
					'unitone',
				];
			}
		);";
		wp_add_inline_script(
			'wp-hooks',
			$data
		);
	}
);

require MY_UNITONE_MASTER_PATH . '/inc/block-styles/block-styles.php';
