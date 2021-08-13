const email = document.getElementById("email");
const contact = document.getElementById("contact");
const reply_email = document.getElementById("reply-email");
const reply_contact = document.getElementById("reply-contact");
const password = document.getElementById("password");
const confirm_pass = document.getElementById("confirm-password");
const pass_span = document.getElementById("reply-password");
const confirm_pass_span = document.getElementById("reply-confirm-password");
const btn = document.getElementById("submit");

window.addEventListener("load", () => {
    btn.style = "pointer-events:none";
})


/*email event listener start*/
email.addEventListener("input", () => {
        reply_email.innerText = verifyEmail(email.value);

        if (reply_email.innerText !== "Email is valid") {
            btn.style = "pointer-events:none";
            reply_email.classList.add("fail");
            reply_email.classList.remove("pass");
        } else {
            btn.style = "pointer-events:auto";
            reply_email.classList.add("pass");
            reply_email.classList.remove("fail");
        }
    })
    /*email event listener end*/



/*contact event listener start*/
contact.addEventListener("input", () => {
        reply_contact.innerText = verifyContact(contact.value);

        if (reply_contact.innerText !== "Contact is valid") {
            btn.style = "pointer-events:none";
            reply_contact.classList.add("fail");
            reply_contact.classList.remove("pass");
        } else {
            btn.style = "pointer-events:auto";
            reply_contact.classList.add("pass");
            reply_contact.classList.remove("fail");
        }
    })
    /*contact event listener end*/


/*password event listeners start*/
var pass;
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
    /*password event listeners end*/

/*confirm password event listener start*/
var confirm_password;
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
        if ((pass_span.getAttribute("class") == "pass") && (confirm_pass_span.getAttribute("class") == "pass") &&
            reply_email.getAttribute("class") == "pass" && reply_contact.getAttribute("class") == "pass") {
            btn.style = "pointer-events:auto";
        } else {
            btn.style = "pointer-events:none";
        }
    })
    /*confrim password event listener end*/

/*functions section start*/
/*email verification function start*/
function verifyEmail(Email) {
    var email_sign = /@/;
    var dot = /[.]/;

    if (email_sign.test(Email) == false || dot.test(Email) == false) {
        return "Enter a proper email";
    } else if (email_sign.test(Email) == true && dot.test(Email) == true) {
        return "Email is valid";
    }
}
/*email verification function end*/

/*contact verification function start*/
function verifyContact(Contact) {
    var length = Contact.length;
    var numbers = /[^0-9]/;
    if (numbers.test(Contact) == true || length < 10) {
        return "Enter a valid number";
    } else if (numbers.test(Contact) == false && length >= 10) {
        return "Contact is valid";
    }
}
/*contact verification function end*/

/*password verification function start*/
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
/*password verification function end*/
/*functions section end*/