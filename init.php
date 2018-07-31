<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Laravel DD Dumper
 * Plugin URI:
 * Description:       Laravel's dump and die function
 * Version:           1.0.0
 * Author:            Maze Code
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-dd
 */

// If this file is called directly, abort.
!defined('WPINCDD') or die;


//Autoload Composer packages
require __DIR__ . '/vendor/autoload.php';

// If we haven't loaded this plugin from Composer we need to add our own autoloader
if (!class_exists('MazeCode\DumpDie')) {
    $autoloader = require_once 'autoload.php';
    $autoloader('MazeCode\\', __DIR__ . '/src');
}

/**
 * Disable Wordpress emoji's as they mess with the var-dumper
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

if (!function_exists('d')) {
	function d()
	{
		(new MazeCode\DumpDie())::dd(func_get_args());
	}
}
