<?php

if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

class CF7IP_Button {
	public function init() {

    add_shortcode(
        'cf7_btn',
        [ $this, 'register_cf7_button' ]
    );

	}

    public function register_cf7_button( $atts, $content){
        //__('Field name', 'cf7-intl-phone')
        //data-title="Записаться на консультацию"
        return 
        ?>
        <button
            class="cf7ip-modal-open"
            data-modal="booking-modal"
            data-animation="fade"
            data-button-title="<?php echo esc_attr($atts['button_title']) ?>"
            data-course="B2 Beruf"
            data-title="<?php echo  esc_attr($atts['title']) ?>">

          <?php echo esc_attr($atts['button_title']) ?>

        </button>

        <?php

    }
    public function cf7_modal( $atts, $content){
        return ?>

        <div id="booking-modal" class="cf7ip-modal">

            <div class="cf7ip-modal-overlay"></div>

            <div class="cf7ip-modal-window">

                <button class="cf7ip-modal-close">&times;</button>

                <h3 class="cf7ip-modal-title"></h3>

                <div class="cf7ip-modal-content">

                    Modal Content

                </div>

        </div>

    </div>
        
        <?php

    }

}