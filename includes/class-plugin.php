<?php

if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

class CF7_Intl_Phone {

 public function run() {

  $this->load_dependencies();

  $this->init_hooks();

 }

 private function load_dependencies() {

  require_once CF7IP_PATH . 'includes/class-assets.php';
  require_once CF7IP_PATH . 'includes/class-cf7.php';
  require_once CF7IP_PATH . 'includes/class-cf7-button.php';
  require_once CF7IP_PATH . 'includes/class-cf7-modal.php';
  require_once CF7IP_PATH . 'includes/class-shortcode-builder.php';
 }

 private function init_hooks() {

  $assets = new CF7IP_Assets();
  $assets->init();

	$this->cf7_code = new CF7IP_CF7();
	$this->cf7_code->init();

  $this->button = new CF7IP_Button();
  $this->button ->init();
  
  $this->modalWin = new CF7IP_Modal();
  $this->modalWin ->init();

  // $this->shortcode_builder = new CF7IP_Shortcode_Builder();
  // $this->shortcode_builder->init();

 }

}