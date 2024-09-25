const list = document.querySelectorAll(".navigation li a");
const currentUrl = window.location.href;

list.forEach(item => {
    if (currentUrl.includes(item.getAttribute('href'))) {
        item.parentElement.classList.add('hovered');
    }
});

// Si quieres activar el hover al hacer clic
list.forEach(item => {
    item.addEventListener('click', function () {
        list.forEach(i => i.parentElement.classList.remove('hovered'));
        this.parentElement.classList.add('hovered');
    });
});

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
