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
				'target' => 'unitone/layers',
				'name'   => 'bg-gradient-animation-01',
				'label'  => '背景グラデアニメ01',
			],
			[
				'target' => 'unitone/layers',
				'name'   => 'bg-gradient-animation-02',
				'label'  => '背景グラデアニメ02',
			],
			[
				'target' => 'unitone/layers',
				'name'   => 'bg-gradient-animation-03',
				'label'  => '背景グラデアニメ03',
			],
			[
				'target' => 'unitone/layers',
				'name'   => 'bg-gradient-animation-04',
				'label'  => '背景グラデアニメ04',
			],
			[
				'target' => 'core/heading',
				'name' => 'color-gradient-animation-01',
				'label' => 'カラーグラデアニメ01',
			]
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
