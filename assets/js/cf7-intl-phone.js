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

//form in modal window	
document.addEventListener('DOMContentLoaded', () => {

    const buttons = document.querySelectorAll('.cf7ip-modal-open');

    buttons.forEach(button => {

        button.addEventListener('click', () => {

            const modal = document.getElementById(
                button.dataset.modal
            );

            if (!modal) {
                return;
            }

            const title = modal.querySelector(
                '.cf7ip-modal-title'
            );
            
            /* const newTitle = button.dataset.title;

            if (newTitle) {
                title.textContent = newTitle;
            } */

            if (title) {
                title.textContent = button.dataset.title || '';
            }

            modal.classList.add('active');

            //document.body.style.overflow = 'hidden';
            document.body.classList.add('cf7ip-modal-lock');

        });

    });

    document.querySelectorAll('.cf7ip-modal').forEach(modal => {

        const close = () => {

            modal.classList.remove('active');

            //document.body.style.overflow = '';
            document.body.classList.remove('cf7ip-modal-lock');

        };

        modal.querySelector('.cf7ip-modal-close')
            ?.addEventListener('click', close);

        modal.querySelector('.cf7ip-modal-overlay')
            ?.addEventListener('click', close);

    });

    document.addEventListener('keydown', e => {

        if (e.key !== 'Escape') {
            return;
        }

        document
            .querySelectorAll('.cf7ip-modal.active')
            .forEach(modal => {

                modal.classList.remove('active');

            });

       // document.body.style.overflow = '';
       document.body.classList.remove('cf7ip-modal-lock');

    });

});