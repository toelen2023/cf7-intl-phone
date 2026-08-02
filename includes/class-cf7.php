<?php

if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

class CF7IP_CF7 {
	public function init() {

    add_action(
        'wpcf7_init',
        [ $this, 'register_form_tag' ]
    );

		add_action(
        'wpcf7_admin_init',
        [ $this, 'register_tag_generator' ]
    );

	}

	public function register_form_tag() {

			wpcf7_add_form_tag(
					[ 'intl-phone', 'intl-phone*' ],
					[ $this, 'render_tag' ],
					[
							'name-attr' => true,
					]
			);		
	}

	public function render_tag( $tag ) {

    $name = $tag->name;

		$id = $tag->get_id_option();

		$class = $tag->get_class_option();

		$placeholder = $tag->get_option( 'placeholder', '', true );

		$default = $tag->get_option( 'default', '', true );

		$preferred = $tag->get_option( 'preferred', '', true );

		error_log( print_r( $tag, true ) );

    ob_start();
    ?>

    <input
        type="tel"
        name="<?php echo esc_attr( $name ); ?>"
        class="wpcf7-form-control cf7ip-phone">

    <input
        type="hidden"
        name="phone_full"
				class="cf7ip-full-phone">

    <?php

    return ob_get_clean();

	}

	public function register_tag_generator() {

    $tag_generator = WPCF7_TagGenerator::get_instance();

    $tag_generator->add(
        'intl-phone',
        __( 'International Phone', 'cf7-intl-phone' ),
        [ $this, 'tag_generator' ]
    );

	}

	public function tag_generator( $contact_form, $args ) {
		//https://github.com/rocklobster-in/contact-form-7/blob/master/modules/text.php?utm_source=chatgpt.com
    ?>
    <div class="control-box">

        <table>

            <h3>
                <?php esc_html_e( 'Generate an international phone field.', 'cf7-intl-phone' ); ?>
						</h3>

            <!-- Здесь будут поля -->
				<?php 

                $this->render_text_field(
                    __('Field name', 'cf7-intl-phone'),
                    'name',
                    'tg-name oneline'
                );

                $this->render_checkbox(
                    __('Required field', 'cf7-intl-phone'),
                    'required'
                );

                $this->render_text_field(
                    __('Placeholder', 'cf7-intl-phone'),
                    'placeholder',
                    'oneline'
                );

                $this->render_text_field(
                    __('Default country', 'cf7-intl-phone'),
                    'default',
                    'option oneline',
                    __('Example: ua', 'cf7-intl-phone')
                );

                $this->render_text_field(
                    __('Preferred countries', 'cf7-intl-phone'),
                    'preferred',
                    'option oneline',
                    __('Example: ua,de,pl', 'cf7-intl-phone')
                );

                $this->render_text_field(
                    __('CSS class', 'cf7-intl-phone'),
                    'class',
                    'classvalue option oneline'
                );

                $this->render_text_field(
                    __('Id attribute', 'cf7-intl-phone'),
                    'id',
                    'idvalue option oneline'
                );
                
                
			?>

        </table>

    </div>
    <?php
}

private function render_text_field(
    string $label,
    string $name,
    string $class,
    string $placeholder = '',
    string $value = '' ) {
    ?>

    <tr>
        <th scope="row">
            <?php echo esc_html( $label ); ?>
        </th>
        <td>
            
                <input type="text"
                name="<?php echo esc_attr($name); ?>"
                class="<?php echo esc_attr($class); ?>"
                placeholder="<?php echo esc_attr($placeholder); ?>"
                value="<?php echo esc_attr($value); ?>">
            <label><?php echo esc_attr($placeholder); ?></label>
        </td>
    </tr>
    
    

    <?php
}
private function render_checkbox(
    string $label,
    string $name,
    bool $checked = false
     ):void {
    ?>
    <tr>
        <th scope="row">
            <?php echo esc_html( $label ); ?>
        </th>
        <td>
            <label>
                <input
                    type="checkbox"
                    name="<?php echo esc_attr( $name ); ?> <?php checked ($checked) ?>">
                <?php esc_html_e( 'Required field', 'cf7-intl-phone' ); ?>
            </label>
        </td>
    </tr>
    <?php
}


	

}