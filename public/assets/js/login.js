var eye = document.getElementById('eye');
var password = document.getElementById('password');
var hidePassword = true;

eye.addEventListener("click", function () {
    if (hidePassword == true) {
        password.setAttribute('type', 'text');
        eye.classList.add('fa-eye-slash')
        eye.classList.remove('fa-eye');
        hidePassword = false;
    }
    else {
        password.setAttribute('type', 'password');
        eye.classList.add('fa-eye');
        eye.classList.remove('fa-eye-slash');
        hidePassword = true;
    }
});



// ------------------- check the "Invalid login please try again !" message -------------------


var error_msg = document.getElementById('error_msg');
var invalid_login = document.getElementById('invalid_login');


if (invalid_login.innerHTML == "Invalid login please try again !") {
    error_msg.classList.add('active');
}

setTimeout(function(){
    error_msg.classList.remove('active');
    error_msg.style.display = "none";
}, 3000);
