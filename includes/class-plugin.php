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
 }

 private function init_hooks() {

  $assets = new CF7IP_Assets();
  $assets->init();

	$this->cf7 = new CF7IP_CF7();
	$this->cf7->init();

  $this->button = new CF7IP_Button();
  $this->button ->init();
  
  $this->modal = new CF7IP_Modal();
  $this->modal ->init();

 }

}