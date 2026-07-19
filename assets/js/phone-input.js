document.addEventListener('DOMContentLoaded', () => {

    const phones = document.querySelectorAll(
        '.wpcf7 input[type="tel"]'
    );

    phones.forEach((phone) => {

        window.intlTelInput(phone, {

        });

    });

});