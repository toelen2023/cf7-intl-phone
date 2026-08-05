<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class CF7IP_Modal {

    /**
     * Нужно ли выводить модалку
     */
    private bool $enabled = false;


    public function init() {

        add_action(
            'cf7ip_modal_needed',
            [ $this, 'enable' ]
        );

        add_action(
            'wp_footer',
            [ $this, 'render' ]
        );

    }


    /**
     * Сообщить, что модалка понадобится
     */
    public function enable() {

        $this->enabled = true;

    }


    /**
     * Вывести модальное окно
     */
    public function render() {

        if ( ! $this->enabled ) {
            return;
        }

        ?>

        <div
            id="cf7ip-modal"
            class="cf7ip-modal"
            aria-hidden="true"
        >

            <div class="cf7ip-modal-overlay"></div>

            <div class="cf7ip-modal-window">

                <button
                    type="button"
                    class="cf7ip-modal-close"
                    aria-label="<?php esc_attr_e( 'Close', 'cf7-intl-phone' ); ?>"
                >
                    &times;
                </button>

                <h3 class="cf7ip-modal-title"></h3>

                <div class="cf7ip-modal-content">

                </div>

            </div>

        </div>

        <?php

    }

}