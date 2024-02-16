const form = document.getElementById('form-login');
const inputName = document.getElementById('inp-name');
const inputPassword = document.getElementById('inp-password');
const divError = document.getElementById('invalid');

form.addEventListener('submit', e => {
    e.preventDefault();
    if (inputName.value.length >= 3 && inputPassword.value.length >= 3) {
        e.target.submit();
    } else {
        divError.classList.add('login-error');
        divError.style.display = "block";
        inputName.focus();
        setTimeout(()=>{
            divError.classList.remove('login-error');
            divError.style.display = "none";
        }, 2200);
    }

});