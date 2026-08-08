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
  add_action(
    'admin_enqueue_scripts',
    [ $this, 'enqueue_admin_assets' ]
    );

 }

 public function enqueue_assets() {

    $this->enqueue_styles();

    $this->enqueue_scripts();

}
private function enqueue_styles() {

    wp_register_style('cf7-intl-input', CF7IP_URL. 'assets/css/intl-tel-input.css', array(), CF7IP_VERSION);
    wp_enqueue_style('cf7-intl-input');

    wp_register_style('cf7-intl-main', CF7IP_URL. 'assets/css/cf7-intl-main.css', array(), CF7IP_VERSION);
    wp_enqueue_style('cf7-intl-main');

}
private function enqueue_scripts() {

    wp_register_script('cf7-intl-input-lib', CF7IP_URL. 'assets/js/intlTelInput.min.js' , '', '29.1.2', true );
    wp_enqueue_script('cf7-intl-input-lib');

    wp_register_script('cf7-intl-input-utils', CF7IP_URL. 'assets/js/intl-tel-input-utils.js' , ['cf7-intl-input-lib'], '2.0', [ 'in_footer' => true ] );
    wp_localize_script( 'cf7-intl-input-utils', 'cf7IntlPhone', [
        'intlUtilsUrl'  => CF7IP_URL. 'assets/js/intl-tel-input-utils.js'
    ] );
    wp_enqueue_script('cf7-intl-input-utils');
    
    wp_register_script('cf7-intl-phone', CF7IP_URL. 'assets/js/cf7-intl-phone.js' , ['cf7-intl-input-lib', 'cf7-intl-input-utils'], CF7IP_VERSION, true );
    wp_enqueue_script('cf7-intl-phone');

  }
 /**
  * Load CSS/JS only on our admin page.
  */
   public function enqueue_admin_assets($hook){
   

    if ( 'tools_page_cf7ip-shortcode-builder' === $hook ) {

        wp_enqueue_script(
            'cf7ip-shortcode-builder',
            CF7IP_URL . 'assets/js/shortcode-builder.js',
            [],
            CF7IP_VERSION,
            true
        );

    }
   }

}

