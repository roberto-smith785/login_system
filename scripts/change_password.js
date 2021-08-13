const password = document.getElementById("password");
const confirm_pass = document.getElementById("confirm-password");
const pass_span = document.getElementById("reply-password");
const confirm_pass_span = document.getElementById("reply-confirm-password");
const btn = document.getElementById("submit");
var pass;
var confirm_password;

window.addEventListener("load", () => {
    btn.style = "pointer-events:none";
})

password.addEventListener("input", () => {
    pass = password.value;
    pass_span.innerText = verifyPassword(pass);

    if (pass_span.innerText == "Password is ok") {
        pass_span.classList.remove("fail");
        pass_span.classList.add("pass");
    } else {
        pass_span.classList.add("fail");
        pass_span.classList.remove("pass");
    }
})
password.addEventListener("change", () => {
    confirm_pass_span.classList.remove("pass");
    confirm_pass_span.classList.remove("fail");
    confirm_pass.value = "";
    confirm_pass_span.innerText = "";
    btn.style = "pointer-events:none";
})

confirm_pass.addEventListener("input", () => {
    confirm_password = confirm_pass.value;

    if (confirm_password !== pass) {
        confirm_pass_span.innerText = "Password mismatch";
        confirm_pass_span.classList.add("fail");
        confirm_pass_span.classList.remove("pass");
    } else {
        confirm_pass_span.innerText = "Password confirmed";
        confirm_pass_span.classList.remove("fail");
        confirm_pass_span.classList.add("pass");

    }
    if ((pass_span.getAttribute("class") == "pass") && (confirm_pass_span.getAttribute("class") == "pass")) {
        btn.style = "pointer-events:auto";
    } else {
        btn.style = "pointer-events:none";
    }
})


function verifyPassword(password) {
    let length = password.length; //used to check length
    let upperCase = /[A-Z]/; //used to look for capital letters
    let lowerCase = /[a-z]/; //used to look for lowercase letters
    let numbers = /[0-9]/; //used to look for numbers
    let specialChar = /[^a-zA-Z0-9]/; //used to look for special characters including spaces

    let errors = []; //stores errors if found

    if (length < 10) {
        errors.push("Password length must be 10 characters");
    }
    if (upperCase.test(password) == false) {
        errors.push("Password must contain capital letters");
    }
    if (lowerCase.test(password) == false) {
        errors.push("Password must contain lowercase letters");
    }
    if (numbers.test(password) == false) {
        errors.push("Password must contain numbers");
    }
    if (specialChar.test(password) == false) {
        errors.push("Password must contain special characters");
    }

    if (errors.length > 0) {
        //return the errors found to the user
        for (var i = 0; i < errors.length; i++) {
            return errors[i];
        }

    } else {
        //inform user the password meets all requirements
        return ("Password is ok");
    }
}