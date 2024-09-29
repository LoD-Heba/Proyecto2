const list = document.querySelectorAll(".navigation li a");
const currentUrl = window.location.href;

list.forEach(item => {
    if (currentUrl.includes(item.getAttribute('href'))) {
        item.parentElement.classList.add('hovered');
    }
});


const menuToggle = document.getElementById('menu-toggle');
const navLinks = document.querySelector('.nav-links ul');

menuToggle.addEventListener('click', () => {
  navLinks.classList.toggle('active');
  menuToggle.classList.toggle('active');
});
