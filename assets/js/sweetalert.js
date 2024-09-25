
// function showSuccessAlert() {
//     Swal.fire({
//         position: "top-end",
//         icon: "success",
//         title: "Producto añadido con éxito",
//         showConfirmButton: false,
//         timer: 1500
//     }).then(() => {
//         window.location.href = 'productos.php';
//     });
// }
// function showSuccessAlert() {
//     Swal.fire({
//         position: "top-end",
//         icon: "success",
//         title: "Producto añadido con éxito",
//         showConfirmButton: false,
//         timer: 1500
//     }).then(() => {
//         window.location.href = 'dashboard/productos.php'; 
//     });
// }

// function confirmDeletion(event) {
//     event.preventDefault(); 
//     Swal.fire({
//         title: "¿Estás seguro?",
//         text: "¡No podrás revertir esto!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Sí, eliminarlo",
//         cancelButtonText: "Cancelar"
//     }).then((result) => {
//         if (result.isConfirmed) {
//             Swal.fire({
//                 title: "Eliminado",
//                 text: "Tu archivo ha sido eliminado.",
//                 icon: "success"
//             }).then(() => {
//                 window.location.href = event.target.href; 
//             });
//         }
//     });
// }
