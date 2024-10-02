
//confirmar
function confirmar(event) {
    event.preventDefault(); 
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Eliminado",
                text: "Tu archivo ha sido eliminado.",
                icon: "success"
            }).then(() => {
                window.location.href = event.target.href;
            });
        }
    });
}

function eliminar_comentario(event) {
    event.preventDefault(); // Evita que el enlace se ejecute inmediatamente
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Eliminado",
                text: "Tu archivo ha sido eliminado.",
                icon: "success"
            }).then(() => {
                window.location.href = event.target.href;
            });
        }
    });
}
function confirmarEliminar(event) {
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro?',
        text: '¡No podrás revertir esto!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = event.target.href;
        }
    });
}

function alertaExito(button) {
	Swal.fire({
		position: "top-end",
		icon: "success",
		title: "Cambios realizados",
		showConfirmButton: false,
		timer: 1800
	  }).then((result) => {
		if (result.isConfirmed) {
			// Enviar el formulario si se confirma
			button.closest('form').submit();
		}
	});
}