document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('cf7ip-form');
    const text = document.getElementById('cf7ip-text');
    const title = document.getElementById('cf7ip-title');
    const animation = document.getElementById('cf7ip-animation');
    const course = document.getElementById('cf7ip-course');
    const teacher = document.getElementById('cf7ip-teacher');
    const cssClass = document.getElementById('cf7ip-class');

    const output = document.getElementById(
        'cf7ip-generated-shortcode'
    );

    const copyButton = document.getElementById(
        'cf7ip-copy-shortcode'
    );

    const copyStatus = document.getElementById(
        'cf7ip-copy-status'
    );


    if (!form || !output) {
        return;
    }


    /**
     * Escape quotes for shortcode attributes.
     */
    function escapeShortcodeValue(value) {

        return value
            .replace(/\\/g, '\\\\')
            .replace(/"/g, '\\"');

    }


    /**
     * Build shortcode.
     */
    function buildShortcode() {

        const attributes = [];

        const values = {
            form: form.value,
            text: text.value,
            title: title.value,
            animation: animation.value,
            course: course.value,
            teacher: teacher.value,
            class: cssClass.value
        };


        Object.entries(values).forEach(([name, value]) => {

            value = value.trim();

            if (!value) {
                return;
            }

            attributes.push(
                ${name}="${escapeShortcodeValue(value)}"
            );

        });


        output.value =
            '[cf7ip_button ' +
            attributes.join(' ') +
            ']';

    }


    /**
     * Update shortcode whenever a field changes.
     */
    [
        form,
        text,
        title,
        animation,
        course,
        teacher,
        cssClass
    ].forEach(field => {

        if (!field) {
            return;
        }

        field.addEventListener('input', buildShortcode);
        field.addEventListener('change', buildShortcode);

    });


    /**
     * Copy shortcode.
     */
    copyButton?.addEventListener('click', async () => {

        try {

            await navigator.clipboard.writeText(
                output.value
            );

            copyStatus.textContent = '✓ Copied!';

            setTimeout(() => {
                copyStatus.textContent = '';
            }, 2000);

        } catch (error) {

            /*
             * Fallback for older browsers.
             */
            output.focus();
            output.select();

            document.execCommand('copy');

            copyStatus.textContent = '✓ Copied!';

            setTimeout(() => {
                copyStatus.textContent = '';
            }, 2000);

        }

    });


    /*
     * Build shortcode immediately
     * using the default values.
     */
    buildShortcode();

});