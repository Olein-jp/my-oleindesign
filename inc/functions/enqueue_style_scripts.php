<?php
/**
 * enqueue_style_scripts.php
 *
 * @package my-unitone-master
 * @author Olein-jp
 * @license GPL-2.0+
 */

/**
 * スタイルとスクリプトの読み込み
 */
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
		wp_enqueue_script(
			'my-unitone-master-script',
			MY_UNITONE_MASTER_URL . '/build/js/script.js',
			null,
			filemtime( MY_UNITONE_MASTER_PATH . '/build/js/script.js' ),
			true
		);
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
