function checkpwrequirement() {
    var password = document.getElementById('password').value;
    var reqs = document.getElementById('passwordrequirementcheck');

    if (password.length < 5) {
        reqs.innerHTML = "Min 5 characters";
        reqs.style.color = "red";
        return;
    }

    if (!password.match(/[a-zA-Z]/)) {
        reqs.innerHTML = "Password should contain both uppercase and lowercase letter";
        reqs.style.color = "red";
        return;
    }

    if (!password.match(/[0-9]/)) {
        reqs.innerHTML = "Password should contain digit";
        reqs.style.color = "red";
        return;
    }

    if (!password.match(/[\W]/)) {
        reqs.innerHTML = "Password should contain as secial character";
        reqs.style.color = "red";
        return;
    }

    reqs.innerHTML = "Password checks all requirements!";
    reqs.style.color = "green";
}
