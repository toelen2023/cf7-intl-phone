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

 }

 private function init_hooks() {

  $assets = new CF7IP_Assets();

  $assets->init();

 }

}