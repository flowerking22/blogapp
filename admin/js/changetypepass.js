window.onload=function(){
    const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
togglePassword.addEventListener('click',function(){
//alert('Password clicked.....');
password.type = password.type === 'password' ? 'text' : 'password';
togglePassword.classList.toggle('fa-eye-slash');
});
};