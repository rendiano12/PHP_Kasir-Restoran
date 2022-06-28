const menu = document.querySelector('#menu-list');
const dropdownMenu = document.querySelector('#dropdown-menu');

menu.addEventListener('click', function () {
    if (dropdownMenu.style.display == 'none') {
        dropdownMenu.style.display = 'inherit';
        this.firstChild.classList.replace('bi-list', 'bi-x');
    } else {
        dropdownMenu.style.display = 'none';
        this.firstChild.classList.replace('bi-x', 'bi-list');
    }
});