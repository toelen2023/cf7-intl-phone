<?php

if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

class CF7IP_Button {

 /**
  * Регистрация шорткода
  */
 public function init(): void {

  add_shortcode(
   'cf7ip_button',
   [ $this, 'render_shortcode' ]
  );

 }

 /**
  * Вывод кнопки
  */
 public function render_shortcode( $atts = [], $content = null ): string {

  // Сообщаем плагину, что модалка понадобится
  do_action( 'cf7ip_modal_needed' );

  // [cf7ip_button text="Sign Up" title="Sign up" animation="slide-top" course="dgdgdfg" course_stream="zdffsd" teacher="sdadfaf"]

  $atts = shortcode_atts(
   [
    'form_id'       => '',
    'text'       => '',
    'title'      => '',
    'animation'  => 'fade',
    'course'     => '',
    'course_stream' => '',
    'teacher'    => '',
    'class'      => '',
   ],
   $atts,
   'cf7ip_button'
  );

  /*
   * Если текст не передан атрибутом,
   * используем содержимое шорткода
   */
  if ( empty( $atts['text'] ) && ! empty( $content ) ) {
   $atts['text'] = $content;
  }

  /*
   * Если вообще ничего нет —
   * выводим значение по умолчанию
   */
  if ( empty( $atts['text'] ) ) {
   $atts['text'] = __( 'Open form', 'cf7-intl-phone' );
  }

  ob_start();
  ?>

  <button
   type="button"
   class="cf7ip-modal-open <?php echo esc_attr( $atts['class'] ); ?>"

   data-form="<?php echo esc_attr( $atts['form_id'] ); ?>"
   data-title="<?php echo esc_attr( $atts['title'] ); ?>"
   data-animation="<?php echo esc_attr( $atts['animation'] ); ?>"
   data-course="<?php echo esc_attr( $atts['course'] ); ?>"
   data-course-stream="<?php echo esc_attr( $atts['course_stream'] ); ?>"
   data-teacher="<?php echo esc_attr( $atts['teacher'] ); ?>"

  >

   <?php echo esc_html( $atts['text'] ); ?>

  </button>

  <div
    class="cf7ip-hidden-form"
    data-form-id="<?php echo esc_attr( $atts['form_id'] ); ?>">

    <?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $atts['form_id']).'"]'); ?>

  </div>

  <?php

  return ob_get_clean();

 }

}

