const list = document.querySelectorAll(".navigation li a");
const currentUrl = window.location.href;

list.forEach(item => {
    if (currentUrl.includes(item.getAttribute('href'))) {
        item.parentElement.classList.add('hovered');
    }
});


// const menuToggle = document.querySelector('.menu-toggle');
// const navigation = document.querySelector('.navigation');
// const container = document.querySelector('container');

// // Función para abrir/cerrar el menú
// menuToggle.addEventListener('click', () => {
//   navigation.classList.toggle('nav-active');
// });
const menuToggle = document.getElementById("menu-toggle");
const navigation = document.getElementById("navigation");
const main = document.querySelector(".main");

menuToggle.addEventListener("click", () => {
  navigation.classList.toggle("active");
  menuToggle.classList.toggle("active");
  main.classList.toggle("shifted");
});