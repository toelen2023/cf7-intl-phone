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
        
        input.addEventListener('blur', function(){
            const currentForm = this.closest('form');
            const code = currentForm.querySelector('.iti__selected-dial-code').textContent;
            const hiddenPhone = currentForm.querySelector('form input[name="phone_full"]');

            let fullNumber = iti.getNumber() || code+input.value;
            hiddenPhone.value = fullNumber;
        })
    });

}

function setFormValue(form, name, value) {

    if (!value) {
        return;
    }

    let field = form.querySelector(
        `[name="${name}"]`
    );

    if (!field) {

        field = document.createElement('input');

        field.type = 'hidden';
        field.name = name;
        console.log(form, form.firstElementChild)

        form.insertBefore(field, form.firstElementChild);
    }

    field.value = value;
}

//form in modal window	

document.addEventListener('DOMContentLoaded', () => {

    const buttons = document.querySelectorAll('.cf7ip-modal-open');
    let currentForm = null, currentFormDiv = null;


    buttons.forEach(button => {

        button.addEventListener('click', () => {

            const modal = document.getElementById("cf7ip-modal");

            if (!modal) {
                return;
            }
            const modalContent = modal.querySelector('.cf7ip-modal-content');


            currentFormDiv = document.querySelector(
                '.cf7ip-hidden-form[data-form-id="' + button.dataset.form + '"]' 
            );
            currentForm = currentFormDiv.firstElementChild;

            setFormValue(
                currentForm.querySelector('form'),
                'course',
                button.dataset.course
            );

            setFormValue(
                currentForm.querySelector('form'),
                'course_stream',
                button.dataset.courseStream
            );
            setFormValue(
                currentForm.querySelector('form'),
                'title',
                button.dataset.title
            );

            modalContent.replaceChildren();
            modalContent.append(currentForm);
   
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
            modal.setAttribute("aria-hidden","false");

            document.body.classList.add('cf7ip-modal-lock');
        });

    });

    document.querySelectorAll('.cf7ip-modal').forEach(modal => {

        const close = () => {

            modal.classList.remove('active');

            //document.body.style.overflow = '';
            document.body.classList.remove('cf7ip-modal-lock');
            modal.setAttribute("aria-hidden","true");
            currentFormDiv.appendChild(currentForm);
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
                modal.setAttribute("aria-hidden","true");

            });

       // document.body.style.overflow = '';
       document.body.classList.remove('cf7ip-modal-lock');
       currentFormDiv.appendChild(currentForm);

    });

});