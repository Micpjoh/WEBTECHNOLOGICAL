function sendRequest(prompt) {
    const data = JSON.stringify({ inputs: prompt });

    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.responseType = 'blob'; 

    xhr.addEventListener('readystatechange', function () {
        if (this.readyState === this.DONE && this.status === 200) {
            const blob = new Blob([this.response], { type: 'image/jpeg' });
            const imageUrl = URL.createObjectURL(blob);
            document.getElementById('resultImage').src = imageUrl;
            document.getElementById('resultImage').style.display = 'block';
        }
    });

    xhr.open('POST', 'https://text2img.p.rapidapi.com/');
    xhr.setRequestHeader('content-type', 'application/json');
    xhr.setRequestHeader('X-RapidAPI-Key', '65d8d8f7demsh55f447fbecea3fep155e0ejsn35f2378349cd');
    xhr.setRequestHeader('X-RapidAPI-Host', 'text2img.p.rapidapi.com');
    xhr.send(data);
}

document.addEventListener('DOMContentLoaded', function() {
    var promptInput = document.getElementById('promptInput');
    var submitButton = document.getElementById('submitButton');

    promptInput.addEventListener('input', function() {
        submitButton.disabled = this.value.trim() === '';
    });

    document.getElementById('promptForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var selectedClothing = "";
        var selectedColor = "";

        var clothingRadios = document.getElementsByName('clothing');
        for (var i = 0; i < clothingRadios.length; i++) {
            if (clothingRadios[i].checked) {
                selectedClothing = clothingRadios[i].value;
                break;
            }
        }

        var colorRadios = document.getElementsByName('Color');
        for (var i = 0; i < colorRadios.length; i++) {
            if (colorRadios[i].checked) {
                selectedColor = colorRadios[i].value;
                break;
            }   
        }
        const userInput = document.getElementById('promptInput').value;
        const fullPrompt = `${selectedClothing}, ${selectedColor} ${userInput}`;
        console.log("Full Prompt: " + fullPrompt);
        sendRequest(fullPrompt);
    });
});

document.getElementById('buyButton').addEventListener('click', function() {
    var selectedClothing = document.querySelector('input[name="clothing"]:checked').value;
    var selectedColor = document.querySelector('input[name="Color"]:checked').value;
    var userInput = document.getElementById('promptInput').value;

    var productDetails = `Clothing: ${selectedClothing} \n
     Color: ${selectedColor} \n
     Design: ${userInput}`;
    document.getElementById('selectedProductDetails').innerText = productDetails;

    var imgSrc = document.getElementById('resultImage').src;
    if (imgSrc) {
        document.getElementById('popupImage').src = imgSrc;
    }

    document.getElementById('popupWindow').style.display = 'block';
});

document.querySelector('.close-btn').addEventListener('click', function() {
    document.getElementById('popupWindow').style.display = 'none';
});