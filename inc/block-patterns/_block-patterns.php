<?php
/**
 * block-patterns.php
 *
 * @package my-unitone-master
 * @author Olein-jp
 * @license GPL-2.0+
 */

/**
 * ブロックパターン追加
 */
add_action(
	'init',
	function () {
		/* 一意のパターンスラッグ名 ex)`my-snow-monkey-master` */
		$my_unitone_master_block_pattern_slug = 'my_unitone_master';

		/* 好きなラベル名とスラッグ名を登録 ex)`My unitone master` */
		$my_unitone_master_block_pattern_categories = [
			$my_unitone_master_block_pattern_slug => [ 'label' => 'My unitone master' ],
		];

		foreach ( $my_unitone_master_block_pattern_categories as $name => $properties ) {
			if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
				register_block_pattern_category( $name, $properties );
			}
		}

		/**
		 * `block-patterns/patterns` の中に保存するファイル名（`.php`拡張子を除く）を設定
		 * 例）
		 * `top-news.php` というパターンを用意した場合、`top-news` と設定する
		 */
		$my_unitone_master_block_patterns = [
			'sample-pattern', /* pattern file name */
		];

		foreach ( $my_unitone_master_block_patterns as $block_pattern ) {
			$block_pattern_file = MY_UNITONE_MASTER_PATH . '/block-patterns/patterns/' . $block_pattern . '.php';

			register_block_pattern(
				$my_unitone_master_block_pattern_slug . '/' . $block_pattern,
				require $block_pattern_file
			);
		}
	}
);
