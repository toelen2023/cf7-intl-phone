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

  $atts = shortcode_atts(
   [
    'form_id'       => '',
    'text'       => '',
    'title'      => '',
    'animation'  => 'fade',
    'course'     => '',
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
   data-teacher="<?php echo esc_attr( $atts['teacher'] ); ?>"

  >

   <?php echo esc_html( $atts['text'] ); ?>

  </button>

  <?php

  return ob_get_clean();

 }

}

