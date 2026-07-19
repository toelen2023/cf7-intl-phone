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
    
 }

}

