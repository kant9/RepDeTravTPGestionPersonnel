const form = document.querySelector('#create-account-form');
const nomInput = document.querySelector('#nom');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const confirmPasswordInput = document.querySelector('#confirm-password');

const prenomInput = document.querySelector('#prenom');
const roleInput = document.querySelector('#role');

form.addEventListener('submit', (event)=>{
    
    validateForm();
    console.log(isFormValid());
    if(isFormValid()==true){
        form.submit();
     }else {
         event.preventDefault();
     }

});

function isFormValid(){
    const inputContainers = form.querySelectorAll('.input-group');
    let result = true;
    inputContainers.forEach((container)=>{
        if(container.classList.contains('error')){
            result = false;
        }
    });
    return result;
}

function validateForm() {
    //NOM
    if(nomInput.value.trim()==''){
        setError(nomInput, 'Name can not be empty');
    }else if(nomInput.value.trim().length <5 || nomInput.value.trim().length > 15){
        setError(nomInput, 'Name must be min 5 and max 15 charecters');
    }else if(!nomInput.value.match(/^[a-zA-Z]/)){
        let message ="Le nom doit commencer par une lettre";
        setError(nomInput,message)
      }
    
    else {
        setSuccess(nomInput);
    }
    // PRENOM
    if(prenomInput.value.trim()==''){
        setError(prenomInput, 'Name can not be empty');
    }else if(prenomInput.value.trim().length <5 || prenomInput.value.trim().length > 15){
        setError(prenomInput, 'Name must be min 5 and max 15 charecters');
    }else if(!prenomInput.value.match(/^[a-zA-Z]/)){
        let message ="Le nom doit commencer par une lettre";
        setError(prenomInput,message)
      }
    
    else {
        setSuccess(prenomInput);
    }

    //EMAIL
    if(emailInput.value.trim()==''){
        setError(emailInput, 'Provide email address');
    }else if(isEmailValid(emailInput.value)){
        setSuccess(emailInput);
    }else{
        setError(emailInput, 'Provide valid email address');
    }

    //PASSWORD
    if(passwordInput.value.trim()==''){
        setError(passwordInput, 'Password can not be empty');
    }else if(passwordInput.value.trim().length <6 || passwordInput.value.trim().length >20){
        setError(passwordInput, 'Password min 6 max 20 charecters');
    }else {
        setSuccess(passwordInput);
    }
    //CONFIRM PASSWORD
    if(confirmPasswordInput.value.trim()==''){
        setError(confirmPasswordInput, 'Password can not be empty');
    }else if(confirmPasswordInput.value !== passwordInput.value){
        setError(confirmPasswordInput, 'Password does not match');
    }else {
        setSuccess(confirmPasswordInput);
    }
    // ROLE
   
    if((roleInput.value !='Admin')&&(roleInput.value !='Simple_User')){
        setError(roleInput, 'Le role est obigatoire: veuillez choisir un');
    }else {
        setSuccess(roleInput);
    }
}

function setError(element, errorMessage) {
    const parent = element.parentElement;
    if(parent.classList.contains('success')){
        parent.classList.remove('success');
    }
    parent.classList.add('error');
    const paragraph = parent.querySelector('p');
    paragraph.textContent = errorMessage;
}

function setSuccess(element){
    const parent = element.parentElement;
    if(parent.classList.contains('error')){
        parent.classList.remove('error');
    }
    parent.classList.add('success');
}

function isEmailValid(email){
    const reg =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    return reg.test(email);
}