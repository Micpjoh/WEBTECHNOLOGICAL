//Function to send a request for the API and handle the response
function sendRequest(prompt) {
    // convert prompt into JSON string
    const data = JSON.stringify({ inputs: prompt });

    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.responseType = 'blob'; 

    xhr.addEventListener('readystatechange', function () {

        //Check if request was completed succesfully
        if (this.readyState === this.DONE && this.status === 200) {
            const blob = new Blob([this.response], { type: 'image/jpeg' });
            const imageUrl = URL.createObjectURL(blob);

            //Update image source and display it along the buyButton
            document.getElementById('resultImage').src = imageUrl;
            document.getElementById('resultImage').style.display = 'block';
            document.getElementById('buyButton').style.display = 'block';
        }
    });

    xhr.open('POST', 'https://text2img.p.rapidapi.com/');
    xhr.setRequestHeader('content-type', 'application/json');
    xhr.setRequestHeader('X-RapidAPI-Key', '65d8d8f7demsh55f447fbecea3fep155e0ejsn35f2378349cd');
    xhr.setRequestHeader('X-RapidAPI-Host', 'text2img.p.rapidapi.com');
    xhr.send(data);
}

// Post request and neccesary headers
document.addEventListener('DOMContentLoaded', function() {
    
    //These are all the elements that will be needed to activate the submit button
    var promptInput = document.getElementById('promptInput');
    var submitButton = document.getElementById('submitButton');
    var clothingRadios = document.getElementsByName('clothing');
    var colorRadios = document.getElementsByName('Color');

    function updateSubmitButtonState() {

        // setting the conditions for submit activation
        var isInputNotEmpty = promptInput.value.trim() !== '';
        var isClothingSelected = Array.from(clothingRadios).some(radio => radio.checked);
        var isColorSelected = Array.from(colorRadios).some(radio => radio.checked);

        submitButton.disabled = !isInputNotEmpty || !isClothingSelected || !isColorSelected;
    }

     //This is the event listeners for the user input and selection changes
    promptInput.addEventListener('input', updateSubmitButtonState);

    Array.from(clothingRadios).forEach(function(radio) {
        radio.addEventListener('change', updateSubmitButtonState);
    });

    Array.from(colorRadios).forEach(function(radio) {
        radio.addEventListener('change', updateSubmitButtonState);
    });

    // Event listener for form submission
    document.getElementById('promptForm').addEventListener('submit', function(event) {
        event.preventDefault();

        //Our variables where we will store our values
        var selectedClothing = "";
        var selectedColor = "";

        // Find the value of the checked radiobutton
        var clothingRadios = document.getElementsByName('clothing');
        for (var i = 0; i < clothingRadios.length; i++) {
            if (clothingRadios[i].checked) {
                selectedClothing = clothingRadios[i].value;
                break;
            }
        }

        //Same process here
        var colorRadios = document.getElementsByName('Color');
        for (var i = 0; i < colorRadios.length; i++) {
            if (colorRadios[i].checked) {
                selectedColor = colorRadios[i].value;
                break;
            }   
        }

        // Combine our previous 2 variable values with the user input and create the full prompt
        const userInput = document.getElementById('promptInput').value;
        const fullPrompt = `${selectedClothing}, ${selectedColor} with print of ${userInput}`;
        console.log("Full Prompt: " + fullPrompt);

        //Send the full prompt to the sendRequest function
        sendRequest(fullPrompt);
    });
});

// event listener for the buy button
document.getElementById('buyButton').addEventListener('click', function() {

    // Our input/ checked values get stored
    var selectedClothing = document.querySelector('input[name="clothing"]:checked').value;
    var selectedColor = document.querySelector('input[name="Color"]:checked').value;
    var userInput = document.getElementById('promptInput').value;

    //and get displayed like so
    var productDetails = `Clothing: ${selectedClothing} \n
     Color: ${selectedColor} \n
     Design: ${userInput}`;
    document.getElementById('selectedProductDetails').innerText = productDetails;

    // Here we set the image source for our pop-up window
    var imgSrc = document.getElementById('resultImage').src;
    if (imgSrc) {
        document.getElementById('popupImage').src = imgSrc;
    }

    //This displays the pop-up
    document.getElementById('popupWindow').style.display = 'block';
});

//And here when we press the x or as we call it the close button will make the pop-up disappear
document.querySelector('.close-btn').addEventListener('click', function() {
    document.getElementById('popupWindow').style.display = 'none';
});