const list = document.querySelectorAll(".navigation li a");
const currentUrl = window.location.href;

list.forEach(item => {
    if (currentUrl.includes(item.getAttribute('href'))) {
        item.parentElement.classList.add('hovered');
    }
});

const inputFile = document.getElementById("imagen");
const imagePreview = document.getElementById("imagePreview");
const imagePreviewImg = document.getElementById("imagePreviewImg");

inputFile.addEventListener("change", function () {
    const file = this.files[0];
    
    if (file) {
        const reader = new FileReader();
        imagePreview.style.display = "flex"; // Muestra el contenedor de la imagen
        reader.addEventListener("load", function () {
            imagePreviewImg.setAttribute("src", this.result);
        });
        reader.readAsDataURL(file);
    } else {
        imagePreview.style.display = "none"; // Oculta la vista previa si no hay archivo
        imagePreviewImg.setAttribute("src", "");
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