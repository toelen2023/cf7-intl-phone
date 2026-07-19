class Assets {

    public function enqueue() {

        wp_enqueue_style(
            'intl-tel-input',
            plugin_dir_url(FILE) . 'css/intlTelInput.css'
        );

        wp_enqueue_script(
            'intl-tel-input',
            plugin_dir_url(FILE) . 'js/intlTelInput.min.js',
            [],
            '25.0',
            true
        );

        wp_enqueue_script(
            'cf7-phone',
            plugin_dir_url(FILE) . 'js/phone.js',
            ['intl-tel-input'],
            '1.0',
            true
        );

    }
}