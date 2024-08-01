<?php
/**
 * block-styles.php
 *
 * @package my-unitone-master
 * @author Olein-jp
 * @license GPL-2.0+
 */
add_action(
	'init',
	function() {
		/**
		 * ブロックスタイル追加
		 *
		 * ブロック名を探したい場合は
		 *
		 * @link https://github.com/inc2734/unitone/tree/main/src/blocks
		 */
		$block_styles = [
			[
				'target' => 'core/button', /* ex) unitone/accordion */
				'name'   => 'sample', /* This setting will create .is-style-sample CSS class */
				'label'  => 'Block Style Sample',
			],
		];

		foreach ( $block_styles as $block_style ) {
			register_block_style(
				$block_style['target'],
				array(
					'name'  => $block_style['name'],
					'label' => $block_style['label'],
				)
			);
		}
	}
);
