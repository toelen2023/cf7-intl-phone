<?php

if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

class CF7IP_Assets {

 public function init() {

  add_action(
   'wp_enqueue_scripts',
   [ $this, 'enqueue_assets' ]
  );

 }

 public function enqueue_assets() {

    $this->enqueue_styles();

    $this->enqueue_scripts();

}
private function enqueue_styles() {

    wp_register_style('cf7-intl-input', CF7IP_URL. '/assets/css/cf7-intl-input.css');

    //wp_register_style(...);

    //wp_enqueue_style(...);

    wp_enqueue_style('cf7-intl-input');

}
private function enqueue_scripts() {

    wp_register_script('cf7-intl-input-lib', CF7IP_URL. '/assets/js/intlTelInput.min.js' , '', '29.1.2', [
		'in_footer' => true,
		'strategy'  => 'async',
	] );
    wp_enqueue_script('cf7-intl-input-lib');

    wp_register_script('cf7-intl-input-utils', CF7IP_URL. '/assets/js/intl-tel-input-utils.js' , ['cf7-intl-input-lib'], '2.0', [
		'in_footer' => true,
		'strategy'  => 'async',
	] );
    wp_enqueue_script('cf7-intl-input-utils');
    
    wp_register_script('cf7-intl-phone', CF7IP_URL. '/assets/js/cf7-intl-phone.js' , ['cf7-intl-input-lib', 'cf7-intl-input-utils'], CF7IP_VERSION,[ 
		'in_footer' => true,
		'strategy'  => 'async',
	] );
    wp_enqueue_script('cf7-intl-phone');

}

}

