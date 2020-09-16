<?php

/**
 * Plugin Name:       IAB Patterns
 * Plugin URI:        http://iambrent.com/iab-patterns
 * Description:       Block Editor Patterns
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Brent Miller
 * Author URI:        http://iambrent.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       iab-patterns
 * Domain Path:       /languages
 */

function iab_patterns() {
  if (function_exists('register_block_pattern_category')) {

    register_block_pattern_category(
      'iab-patterns',
      array('label' => __('IAB', 'iab-patterns'))
    );
    
  }

  if (function_exists('register_block_pattern')) {

    register_block_pattern (
      'iab-patterns/example-pattern',
      array (
        'categories'    => array('iab-patterns'),
        'title'       => __('Example Pattern', 'iab-patterns'),
        'description' => _x('A demostration pattern to show the power of patterns', 'iab-patterns'),
        'content'     => file_get_contents( plugin_dir_path( __FILE__ ) . 'patterns/example-pattern.txt'),
      )
    );

  }
}

add_action('init', 'iab_patterns');
