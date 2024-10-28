
//MENU OPENER
const menu = document.querySelector('nav ul');
const menuBtn = document.querySelector('.menu-icon');
const closeBtn = document.querySelector('.close-btn');

menuBtn.addEventListener('click', () => {
    menu.classList.add('open')
});

closeBtn.addEventListener('click', () => {
    menu.classList.remove('open')
});


document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll('.scroll')
    const progressBars = document.querySelectorAll('.progress');

    progressBars.forEach(function(element) {
        let width = element.style.width;
        element.style.width = '0';
        element.style.setProperty('--target-width', width);
    });
});

const form = document.querySelector('form');
form.addEventListener('submit', (e) => {

    document.querySelectorAll('.error-message').forEach((el) => el.remove());

    const firstName = document.getElementById('first-name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const message = document.getElementById('message');

    let valid = true; 

    if (firstName.value.trim() === '') {
        const nameInput = form.querySelector('input[name="first-name"]');
        const errorMessage = document.createElement('p');
        errorMessage.textContent = 'Name is required!';
        errorMessage.classList.add('error-message');
        nameInput.after(errorMessage);
        valid = false;
    }

    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!email.value.trim().match(emailPattern)) {
        const emailInput = form.querySelector('input[name="email"]');
        const errorMessage = document.createElement('p');
        errorMessage.textContent = 'Valid email is required!';
        errorMessage.classList.add('error-message');
        emailInput.after(errorMessage);
        valid = false;
    }

    const phonePattern = /^[0-9]{10}$/;
    if (!phone.value.trim().match(phonePattern)) {
        const phoneInput = form.querySelector('input[name="phone"]');
        const errorMessage = document.createElement('p');
        errorMessage.textContent = 'A valid 10-digit phone number is required.';
        errorMessage.classList.add('error-message');
        phoneInput.after(errorMessage);
        valid = false;
    }

    if (message.value.trim() === '') {
        const messageInput = form.querySelector('textarea[name="message"]');
        const errorMessage = document.createElement('p');
        errorMessage.textContent = 'Message is required.';
        errorMessage.classList.add('error-message');
        messageInput.after(errorMessage);
        valid = false;
    }

 
    if (!valid) {
        e.preventDefault();
    }
});