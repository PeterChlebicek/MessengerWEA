const loginButton = document.querySelector('#login-button');

loginButton.addEventListener('click', () => {
    const username = document.querySelector('input[type=text]').value;
    const password = document.querySelector('input[type=password]').value;

    if (username === 'myusername' && password === 'mypassword') {
        window.location.href = 'page.html';
    } else {
        alert('Chybné uživatelské jméno nebo heslo.');
    }
});