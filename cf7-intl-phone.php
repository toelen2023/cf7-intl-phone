<?php
/**
 * Plugin Name: CF7 International Phone
 * Plugin URI: https://github.com/toelen2023/cf7-intl-phone
 * Description: International phone field for Contact Form 7.
 * Version: 0.1.0
 * Author: Olena
 * Text Domain: cf7-intl-phone
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

define( 'CF7IP_VERSION', '0.2.0' );

define( 'CF7IP_FILE', __FILE__ );

define( 'CF7IP_PATH', plugin_dir_path( __FILE__ ) );

define( 'CF7IP_URL', plugin_dir_url( __FILE__ ) );


require_once CF7IP_PATH . 'includes/class-plugin.php';

$plugin = new CF7_Intl_Phone();

$plugin->run();