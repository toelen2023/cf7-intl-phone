<?php

if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

class CF7IP_Assets {

 public function init() {

  error_log('CF7IP Assets init started');
  add_action(
   'wp_enqueue_scripts',
   [ $this, 'enqueue_assets' ]
  );

 }

 public function enqueue_assets() {
     error_log('CF7IP Assets enqueue_assets started');

    $this->enqueue_styles();

    $this->enqueue_scripts();

}
private function enqueue_styles() {

    wp_register_style('cf7-intl-input', CF7IP_URL. 'assets/css/intl-tel-input.css', array(), CF7IP_VERSION);

   wp_enqueue_style('cf7-intl-input');

}
private function enqueue_scripts() {

    wp_register_script('cf7-intl-input-lib', CF7IP_URL. 'assets/js/intlTelInput.min.js' , '', '29.1.2', true );
    wp_enqueue_script('cf7-intl-input-lib');

    wp_register_script('cf7-intl-input-utils', CF7IP_URL. 'assets/js/intl-tel-input-utils.js' , ['cf7-intl-input-lib'], '2.0', true );
    wp_localize_script( 'cf7-intl-input-utils', 'cf7IntlPhone', [
        'intlUtilsUrl'  => CF7IP_URL. 'assets/js/intl-tel-input-utils.js'
    ] );
    wp_enqueue_script('cf7-intl-input-utils');
    
    wp_register_script('cf7-intl-phone', CF7IP_URL. 'assets/js/cf7-intl-phone.js' , ['cf7-intl-input-lib', 'cf7-intl-input-utils'], CF7IP_VERSION, true );
    wp_enqueue_script('cf7-intl-phone');

}

}

