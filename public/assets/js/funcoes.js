/////// ADICIONAR FOOTER NO FINAL DA PAGINA ////////////
if (document.querySelector('body').offsetHeight > window.innerHeight){
    document.querySelector('footer').classList.add('footer-relative');
}

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
        let valueMissing = 'Por favor, preencha este campo!';

        const messages = {
            text: {
                valueMissing: valueMissing
            },
            email: {
                valueMissing: valueMissing,
                typeMismatch: 'Por favor, preencha com um email válido!'
            },
            password: {
                valueMissing: valueMissing
            },
            number: {
                valueMissing: valueMissing,
                typeMismatch: 'Este compo nâo deve conter somente números!',
                stepMismatch: 'Este campo deve conter 4 digítos, Ex: 2022'
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

function alterFormPayment(){
    let inputs = document.querySelectorAll('input[type="radio"]');
    let payCred = document.getElementById('select-credit');
    let payDebit = document.getElementById('select-debit');
    
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('click', ()=>{

                if(inputs[i].value === 'credit'){
                    payCred.classList.remove('hidden-select');
                    payDebit.classList.add('hidden-select');
                }else{
                    payDebit.classList.remove('hidden-select');
                    payCred.classList.add('hidden-select');
                }
            })
        }
}

/////// MASCARA PARA CNPJ /////////
function maskCnpj() {
    document.getElementById('cnpj').addEventListener('keyup', ()=>{
        let cnpj = removerCaracter(document.getElementById('cnpj').value);
        let mascara = `${cnpj.substr(0, 2)}.${cnpj.substr(2, 3)}.${cnpj.substr(5, 3)}/${cnpj.substr(8, 4)}-${cnpj.substr(12, 2)}`;

        document.getElementById('cnpj').value = mascara;
    });
}

/////// FUNÇÃO PARA REMOVER CARACTERE ///////
function removerCaracter(telefone){
    let regex = /[^0-9]/gi;
    telefone = telefone.replace(regex, '');
    return telefone;
}