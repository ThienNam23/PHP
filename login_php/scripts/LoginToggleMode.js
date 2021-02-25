const elmID = (id) => document.getElementById(id);
var toggleButton = elmID("btn-box");
var formLogin = elmID("login-form");
var formRegister = elmID("register-form");

function resetForm() {
    formRegister.reset();
    formLogin.reset();
}
function login() {
    resetForm();
    toggleButton.style.left = "102px";
    formLogin.style.left = "15px";
    formRegister.style.left = "450px";
}
function register() {
    resetForm();
    toggleButton.style.left = "213px";
    formLogin.style.left = "-410px";
    formRegister.style.left = "15px";
}
resetForm();