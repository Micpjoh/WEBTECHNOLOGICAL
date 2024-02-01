// select all radio buttons, check for change, if yes, make it the value
document.querySelectorAll('label.button-container input[name="clothing"]').forEach(function(radioButton) {
    radioButton.addEventListener('change', function() {
        var selectedClothing = this.value;

        // Update the hidden input field with the selected clothing value
        document.getElementById('selectedClothingInput').value = selectedClothing;
    });
});
<<<<<<< HEAD
//Turn bloburl to base64 url to display in the admin 
=======

// Use to change a blob file in a base64URL, which we then can use as img in database
>>>>>>> a347955 (.)
function blobUrlToBase64(blobUrl, callback) {
    const xhr = new XMLHttpRequest();
    xhr.onload = function() {
        const reader = new FileReader();
        reader.onloadend = function() {
            callback(reader.result);
        };
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', blobUrl);
    xhr.responseType = 'blob';
    xhr.send();
}
//add image to store
document.getElementById('addtoStoreForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var imageUrl = document.getElementById('resultImage').src;
    var form = this;

    blobUrlToBase64(imageUrl, function(base64String) {
        document.getElementById('imageUrlInput').value = base64String;
        form.submit();
    });
});

//all the code here prepares the images to be transported to the catalog and admin page