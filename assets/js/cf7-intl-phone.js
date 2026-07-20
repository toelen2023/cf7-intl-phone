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

        const iti = intlTelInput(input, {
            initialCountryLookup,
            countrySelectorMode: "AUTO",
            loadUtils: () => import(window.cf7IntlPhone.intlUtilsUrl),
        });
        //input._cf7ipInstance = iti;
        input.addEventListener('blur', function(){
            const currentForm = this.closest('form');
            const code = currentForm.querySelector('.iti__selected-dial-code').textContent;
            const hiddenPhone = currentForm.querySelector('form input[name="phone_full"]');
           // let fullNumber = input._cf7ipInstance.getNumber() || code+input.value;
            let fullNumber = iti.getNumber() || code+input.value;
            hiddenPhone.value = fullNumber;
            console.log('iti.getNumber()', iti.getNumber())
            console.log('code+phone.value', code+input.value)
            console.log('hiddenPhone.value', hiddenPhone.value)
            console.log('end onblur')
        })
    });

}

	
/* const wpcf7Elm = document.querySelector( '.wpcf7' );
wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
console.log("submit form")
    if ( event.target.tagName != "FORM" ) return;
    else { 
        let currentForm = event.target;
        const phone= currentForm.querySelector('form input[type="tel"]');
        const hiddenPhone = currentForm.querySelector('form input[name="phone_full"]');
        const code = currentForm.querySelector('.iti__selected-dial-code').textContent;
        let fullNumber = code+phone.value;
        console.log(fullNumber)
        if (phone && phone._cf7ipInstance) {
             fullNumber = phone._cf7ipInstance.getNumber();
        }
        hiddenPhone.value = fullNumber;
        console.log( hiddenPhone.value, fullNumber);
    }
}, false ); */