const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');
const body = document.querySelector('body');

// Función para abrir/cerrar el menú
menuToggle.addEventListener('click', () => {
  navLinks.classList.toggle('nav-active');
});

// Función para cerrar el menu cuando se hace clic fuera del menu
document.addEventListener('click', (e) => {
    if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
        navLinks.classList.remove('nav-active');
    }
});


window.addEventListener('resize', () => {
  if (window.innerWidth > 768) {
    navLinks.classList.remove('nav-active');
  }
});

//deslizamiento suave de url
document.querySelectorAll('.nav-links a').forEach(link => {
	link.addEventListener('click', function(e) {

		const duration = 600; 
		const startPosition = window.pageYOffset;
		const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
		const distance = targetPosition - startPosition;
		let startTime = null;

		function animationScroll(currentTime) {
			if (startTime === null) startTime = currentTime;
			const timeElapsed = currentTime - startTime;
			const run = ease(timeElapsed, startPosition, distance, duration);
			window.scrollTo(0, run);
			if (timeElapsed < duration) requestAnimationFrame(animationScroll);
		}

		function ease(t, b, c, d) {
			t /= d / 2;
			if (t < 1) return c / 2 * t * t + b;
			t--;
			return -c / 2 * (t * (t - 2) - 1) + b;
		}

		requestAnimationFrame(animationScroll);
	});
});


// Botón para subir al inicio
const scrollToTopBtn = document.getElementById('scrollToTopBtn');

window.addEventListener('scroll', () => {
	if (window.scrollY > 300) {
		scrollToTopBtn.style.display = 'flex'; 
	} else {
		scrollToTopBtn.style.display = 'none'; 
	}
});

// Desplazarse suavemente 
scrollToTopBtn.addEventListener('click', () => {
	window.scrollTo({
		top: 0,
		behavior: 'smooth'
	});
});



//PERFIL---PREV ---SWEETALERT

function previewImage(event) {
	const label = document.getElementById('file-label');
	label.style.display = 'none';

	const img = document.getElementById('preview');
	img.src = URL.createObjectURL(event.target.files[0]);
	img.style.display = 'block';
	toggleButton();
}

//botones de aceptar o cancelar cambio de foto
function toggleButton() {
	const submitButton = document.getElementById('submit-button');
	const cancelButton = document.getElementById('cancel-button');
	submitButton.style.display = 'block';
	cancelButton.style.display = 'block';
}

function cancelChange() {
	const label = document.getElementById('file-label');
	const img = document.getElementById('preview');
	const fileInput = document.getElementById('file-input');
	const submitButton = document.getElementById('submit-button');
	const cancelButton = document.getElementById('cancel-button');

	img.style.display = 'none';
	label.style.display = 'block';
	fileInput.value = '';
	submitButton.style.display = 'none';
	cancelButton.style.display = 'none';
}


function confirmCancel(button) {
	Swal.fire({
		title: '¿Estás seguro?',
		text: "No podrás revertir esta acción",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, cancelar',
		cancelButtonText: 'No, mantener'
	}).then((result) => {
		if (result.isConfirmed) {
			// Enviar el formulario si se confirma
			button.closest('form').submit();
		}
	});
}
// Mensaje de éxito
function alertaExito(button) {
	Swal.fire({
		position: "top-end",
		icon: "success",
		title: "Cambios realizados",
		showConfirmButton: false,
		timer: 2500
	  }).then((result) => {
		if (result.isConfirmed) {
			// Enviar el formulario si se confirma
			button.closest('form').submit();
		}
	});
}
function confirmLogout(button) {
    Swal.fire({
        title: '¿Cerrar sesión?',
        showCancelButton: true,
        confirmButtonText: 'Cerrar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            button.closest('form').submit();
        }
    });
}
