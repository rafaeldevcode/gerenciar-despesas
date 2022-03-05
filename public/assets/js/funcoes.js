/////// ADICIONAR FOOTER NO FINAL DA PAGINA ////////////
// if (document.querySelector('body').offsetHeight > window.innerHeight){
    document.querySelector('footer').classList.add('footer-relative');
// }

function exibirPass(){
    document.getElementById('btn-eyes').addEventListener('click', ()=>{
        let pass = document.getElementById('password');
        let eyes = document.getElementById('eyes');
        
        if(pass.type === 'password'){
            pass.type = 'text';
            eyes.classList.remove('fa-eye');
            eyes.classList.add('fa-eye-slash');
        }else{
            pass.type = 'password';
            eyes.classList.remove('fa-eye-slash');
            eyes.classList.add('fa-eye');
        }
    })
}

function oppenMenu(){
    let menuCheck = document.getElementById('checkbox-menu');
    let menuAside = document.querySelector('.menu-aside');

        menuCheck.addEventListener('click', ()=>{

            if(menuCheck.checked === true){
                menuAside.classList.remove('closed-menu');
                menuAside.classList.add('oppen-menu');
            }else{
                menuAside.classList.remove('oppen-menu');
                menuAside.classList.add('closed-menu');
            }
        });

}

function getFields(){
    let fields = document.querySelectorAll('[required]');

    for(let field of fields){
        field.addEventListener('invalid', event => {
            // Eliminar bubble
            event.preventDefault();
            customValidation(event)
        });
        field.addEventListener('blur', customValidation);
    }
}

function validateField(field){
    function verifyError(){
        let foundError = false;

        for(let error in field.validity){
            if(field.validity[error] && !field.validity.valid){
                foundError = error;
            }
        }

        return foundError;
    }

    function setCustomMessage(message){
        let spanError = field.parentNode.querySelector('span.error');
        let avatar = document.getElementById('avatar');

        if(message){
            if(avatar){
                avatar.classList.add('shake');
            };
            spanError.classList.add('danger');
            spanError.innerHTML = message;
        }else{
            if(avatar){
                avatar.classList.remove('shake');
            }
            spanError.classList.remove('danger');
            spanError.innerHTML = '';
        }
    }

    function customMessage(typeError){
        const messages = {
            text: {
                valueMissing: 'Por favor, preencha este campo!'
            },
            email: {
                valueMissing: 'Por favor, preencha este campo!',
                typeMismatch: 'Por favor, preencha com um email válido!'
            },
            password: {
                valueMissing: 'Por favor, preencha este campo!'
            }
        }

        return messages[field.type][typeError];
    }

    return function(){
        let error = verifyError();

        if(error){
            let message = customMessage(error);

            setCustomMessage(message);
        }else{
            setCustomMessage();
        }
    };
}

function customValidation(event){
    let field = event.target;
    let validation = validateField(field);

    validation();
}

function validSelect(idSelect){
    document.querySelector('form').addEventListener('submit', event =>{
        let select = document.getElementById(idSelect);
        let spanError = select.parentNode.querySelector('span.error');

        if(select.value === 'defaut'){
            spanError.classList.add('danger');
            spanError.innerHTML = 'Por favor, selecione uma empresa para prosseguir!';

            event.preventDefault();
            return;
        }else{
            spanError.classList.remove('danger');
            spanError.innerHTML = '';
        }
    });
}