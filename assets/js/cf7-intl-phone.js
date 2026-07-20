document.addEventListener('DOMContentLoaded', function () {

    initPhoneFields();

});


const initialCountryLookup = async () => {
  const res = await fetch("https://ipapi.co/json");
  const data = await res.json();
  return data.country_code;
};

function initPhoneFields() {

    const phoneInputs = document.querySelectorAll('input[type="tel"]');

    if (!phoneInputs.length) {
        return;
    }

    phoneInputs.forEach(function (input) {

        /* intlTelInput(input, {

            initialCountry: "auto",

            utilsScript:
                "/wp-content/plugins/cf7-intl-phone/assets/js/intl-tel-input-utils.js"

        }); */
        intlTelInput(input, {
            initialCountryLookup,
            countrySelectorMode: "AUTO",
            loadUtils: () => import(window.cf7IntlPhone.intlUtilsUrl),
        });


    });

    



}