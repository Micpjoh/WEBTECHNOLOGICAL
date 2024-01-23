document.getElementById("contact-form").addEventListener("submit", function(event){
    var name = document.forms["contact-form"]["name"].value;
    var email = document.forms["contact-form"]["email"].value;
    var subject = document.forms["contact-form"]["subject"].value;
    var message = document.forms["contact-form"]["message"].value;
    var isValid = true;

    // Validate Name
    if (name.length < 2 || /[^a-zA-Z0-9\s]/.test(name)) {
        alert("Invalid name. Names must be at least 2 characters long and contain only letters, numbers, and spaces.");
        isValid = false;
    }

    // Validate Email
    if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert("Invalid email format.");
        isValid = false;
    }

    // Validate Subject
    if (subject.length < 2) {
        alert("Subject must be at least 2 characters long.");
        isValid = false;
    }

    // Validate Message
    if (message.length < 10) {
        alert("Message must be at least 10 characters long.");
        isValid = false;
    }

    // Prevent form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});
