const user_id = document.getElementById("username");
const password = document.getElementById("password");
const btn = document.getElementById("submit");

window.addEventListener("load", () => {
    btn.style = "pointer-events:none";
})


user_id.addEventListener("input", () => {
    if (user_id.value != "" && password.value != "") {
        btn.style = "pointer-events:auto";
    } else {
        btn.style = "pointer-events:none";
    }
})

password.addEventListener("input", () => {
    if (user_id.value != "" && password.value != "") {
        btn.style = "pointer-events:auto";
    } else {
        btn.style = "pointer-events:none";
    }
})