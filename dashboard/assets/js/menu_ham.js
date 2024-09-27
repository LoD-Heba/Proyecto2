// const list = document.querySelectorAll(".navigation li a");
// const currentUrl = window.location.href;

// list.forEach(item => {
//     if (currentUrl.includes(item.getAttribute('href'))) {
//         item.parentElement.classList.add('hovered');
//     }
// });

// // Si quieres activar el hover al hacer clic
// list.forEach(item => {
//     item.addEventListener('click', function () {
//         list.forEach(i => i.parentElement.classList.remove('hovered'));
//         this.parentElement.classList.add('hovered');
//     });
// });

// list.forEach((item) => item.addEventListener("mouseover", activeLink));

// document.querySelector('.menu-toggle').addEventListener('click', function() {
//     document.querySelector('.menu').classList.toggle('active');
// });

//MENU HAMBURGUESA
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');
const body = document.querySelector('body');

// Función para abrir/cerrar el menú
menuToggle.addEventListener('click', () => {
  navLinks.classList.toggle('nav-active');
});

// Función para cerrar el menú cuando se hace clic fuera del menú
document.addEventListener('click', (e) => {
    if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
        navLinks.classList.remove('nav-active');
    }
});

// Cierra el menú al cambiar el tamaño de la ventana si es mayor de 768px
// window.addEventListener('resize', () => {
//   if (window.innerWidth > 768) {
//     navLinks.classList.remove('nav-active');
//   }
// });
