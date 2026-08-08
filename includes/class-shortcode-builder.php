<?php

if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

class CF7IP_Shortcode_Builder {

 /**
  * Initialize the shortcode builder.
  */

 public function init(): void {

    add_action(
        'admin_menu',
        [ $this, 'register_menu' ]
    );

}

public function register_menu(): void {

    add_management_page(
        __( 'CF7 Intl Phone', 'cf7-intl-phone' ),
        __( 'CF7 Intl Phone', 'cf7-intl-phone' ),
        'manage_options',
        'cf7ip-shortcode-builder',
        [ $this, 'render_page' ],
        10
    );

}
 
 /**
  * Render admin page.
  */
 public function render_page(): void {

  ?>

  <div class="wrap cf7ip-shortcode-builder">

   <h1>
    <?php
    esc_html_e(
     'CF7 Intl Phone — Shortcode Builder',
     'cf7-intl-phone'
    );
    ?>
   </h1>

    <p>
    <?php
    esc_html_e(
     'Create a shortcode for the CF7 modal button.',
     'cf7-intl-phone'
    );
    ?>
   </p>
   <table class="form-table">

    <tr>
     <th scope="row">
      <label for="cf7ip-form_id">
       <?php esc_html_e( 'Form ID', 'cf7-intl-phone' ); ?>
      </label>
     </th>

     <td>
      <input
       type="text"
       id="cf7ip-form_id"
       class="regular-text"
       placeholder="081af97"
      >

      <p class="description">
       <?php
       esc_html_e(
        'Value of the id attribute in Contact Form plugin.',
        'cf7-intl-phone'
       );
       ?>
      </p>
     </td>
    </tr>

    <tr>
     <th scope="row">
      <label for="cf7ip-text">
       <?php esc_html_e( 'Button text', 'cf7-intl-phone' ); ?>
      </label>
     </th>

     <td>
      <input
       type="text"
       id="cf7ip-text"
       class="regular-text"
       value="<?php esc_attr_e( 'Sign Up', 'cf7-intl-phone' ); ?>"
      >
     </td>
    </tr>

    <tr>
     <th scope="row">
      <label for="cf7ip-title">
       <?php esc_html_e( 'Modal title', 'cf7-intl-phone' ); ?>
      </label>
     </th>

     <td>
      <input
       type="text"
       id="cf7ip-title"
       class="regular-text"
       placeholder="Sign Up for a consultation"
      >
     </td>
    </tr>

    <tr>
     <th scope="row">
      <label for="cf7ip-animation">
       <?php esc_html_e( 'Animation', 'cf7-intl-phone' ); ?>
      </label>
     </th>

     <td>
      <select id="cf7ip-animation">

       <option value="fade">
        Fade
       </option>

       <option value="zoom">
        Zoom
       </option>

       <option value="slide-top">
        Slide top
       </option>

       <option value="slide-bottom">
        Slide bottom
       </option>

       <option value="slide-left">
        Slide left
       </option>

       <option value="slide-right">
        Slide right
       </option>

      </select>
     </td>
    </tr>

    <tr>
     <th scope="row">
      <label for="cf7ip-course">
       <?php esc_html_e( 'Course', 'cf7-intl-phone' ); ?>
      </label>
     </th>

     <td>
      <input
       type="text"
       id="cf7ip-course"
       class="regular-text"
       placeholder="Practical Psychology"
      >
     </td>
    </tr>

    <tr>
     <th scope="row">
      <label for="cf7ip-course-stream">
       <?php esc_html_e( 'Course Stream', 'cf7-intl-phone' ); ?>
      </label>
     </th>

     <td>
      <input
       type="text"
       id="cf7ip-course-stream"
       class="regular-text"
      >
     </td>
    </tr>
    <tr>
     <th scope="row">
      <label for="cf7ip-teacher">
       <?php esc_html_e( 'Teacher', 'cf7-intl-phone' ); ?>
      </label>
     </th>

     <td>
      <input
       type="text"
       id="cf7ip-teacher"
       class="regular-text"
      >
     </td>
    </tr>

    <tr>
     <th scope="row">
      <label for="cf7ip-class">
       <?php esc_html_e( 'Additional CSS class', 'cf7-intl-phone' ); ?>
      </label>
     </th>

     <td>
      <input
       type="text"
       id="cf7ip-class"
       class="regular-text"
       placeholder="my-button"
      >
     </td>
    </tr>

   </table>

   <hr>

   <h2>
    <?php esc_html_e( 'Generated shortcode', 'cf7-intl-phone' ); ?>
   </h2>
   <p>
    <textarea
     id="cf7ip-generated-shortcode"
     class="large-text code"
     rows="4"
     readonly
    ></textarea>
   </p>

   <p>

    <button
     type="button"
     id="cf7ip-copy-shortcode"
     class="button button-primary"
    >
     <?php esc_html_e( 'Copy shortcode', 'cf7-intl-phone' ); ?>
    </button>

    <span
     id="cf7ip-copy-status"
     class="cf7ip-copy-status"
     aria-live="polite"
    ></span>

   </p> 
   

  </div> 

  <?php
 }
}