const toggleBtn = document.querySelector('.nav-bars')
const dropDownMenu = document.querySelector('.nav-dropdown')

toggleBtn.onclick = function() {
    dropDownMenu.classList.toggle('open')
}

document.addEventListener('DOMContentLoaded', function () {
    const accordionItems = document.querySelectorAll('.accordion');

    accordionItems.forEach(item => {
        item.addEventListener('click', function () {
            this.classList.toggle('active');
        });
    });
});

