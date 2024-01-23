document.getElementById("signup-form").addEventListener("submit", function(event){
    var username = document.forms["signup-form"]["name"].value;
    var email = document.forms["signup-form"]["email"].value;
    var terms = document.forms["signup-form"]["consent"].checked;

    if (username.length < 2 || /[^a-zA-Z0-9]/.test(username)) {
        alert("Invalid username. Usernames must be at least 2 characters long and contain only letters and numbers.");
    }

    if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert("Invalid email format.");
    }

    if (!terms) {
        alert("Please accept the terms and conditions.");
    }
});