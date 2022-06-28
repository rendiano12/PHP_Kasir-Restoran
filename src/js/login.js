const tabLogin = document.querySelector('#tab-login');
const tabRegister = document.querySelector('#tab-login').nextElementSibling;
const form = document.querySelector('#form');
const judul = document.querySelector('#judul-form');

tabLogin.addEventListener('click', function () {
    form.innerHTML = `
        <input class="form-control mx-auto d-block" type="text" autocomplete="off" name="username" placeholder="Username" required><br>
        <input class="form-control mx-auto d-block" type="password" autocomplete="off" name="password" placeholder="Password" required><br>
        <button class="btn btn-primary" name="login">Login</button>
    `;
    judul.textContent = 'LOGIN';
    if (!tabLogin.classList.contains('btn-primary')) {
        tabLogin.classList.replace('btn-outline-primary', 'btn-primary');
        tabRegister.classList.replace('btn-primary', 'btn-outline-primary');
    }
});

tabRegister.addEventListener('click', function() {
    form.innerHTML = `
        <input class="form-control mx-auto d-block" type="text" autocomplete="off" name="username" placeholder="Username" required><br>
        <input class="form-control mx-auto d-block" type="password" autocomplete="off" name="password" placeholder="Password" required><br>
        <input class="form-control mx-auto d-block" type="password" autocomplete="off" name="konfirmasi-password" placeholder="Konfirmasi Password" required><br>
        <button class="btn btn-primary" name="register">Register</button>
    `;
    judul.textContent = 'REGISTER';
    if (!tabRegister.classList.contains('btn-primary')) {
        tabRegister.classList.replace('btn-outline-primary', 'btn-primary');
        tabLogin.classList.replace('btn-primary', 'btn-outline-primary');
    }
});