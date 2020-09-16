<?php

/**
 * Plugin Name:       IAB Patterns
 * Plugin URI:        http://iambrent.com/iab-patterns
 * Description:       Custom Block Editor Patterns
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

  iab_register_pattern('example-pattern', 'Example Pattern', 'A demostration pattern to show the power of patterns');
}

add_action('init', 'iab_patterns');

/**
 * Registers custom block patterns
 *  
 * @since 0.0.1
 * 
 * @param String $id (required) A unique name for your pattern
 * @param String $title (required) A human-readable title for the pattern.
 * @param String $description A visually hidden text used to describe the pattern in the inserter. A description is optional but it is strongly encouraged when the title does not fully describe what the pattern does.
 * @param Array $categories (optional) A list of pattern categories used to group block patterns. Block patterns can be shown on multiple categories.
 */
function iab_register_pattern($id, $title, $description = '', $categories = array('iab-patterns')) {
  if (function_exists('register_block_pattern')) {

    register_block_pattern (
      'iab-patterns/' . $id,
      array (
        'categories'    => $categories,
        'title'       => __($title, 'iab-patterns'),
        'description' => _x($description, 'iab-patterns'),
        'content'     => file_get_contents( plugin_dir_path( __FILE__ ) . 'patterns/' . $id . '.txt'),
      )
    );

  }
}
